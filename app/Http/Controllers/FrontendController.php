<?php

namespace App\Http\Controllers;


use App\Models\AddCard;
use App\Models\Card;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{
    public function index()
    {
        $page = 'index';

        $meta = [
            'meta_title' => 'Viettiepuocmo',
            'meta_desc' => 'Viettiepuocmo',
            'meta_keywords' => 'Viettiepuocmo',
            'meta_image' => url('frontend/images/logo.png'),
            'meta_url' => url('/'),
        ];
        $is_login = false;
        $member = null;
        if (session()->has('user_login')) {
            $is_login = true;
            $member = Member::find(session()->get('user_login'))->toArray();
        }

        return view('frontend.index', compact(
            'page', 'is_login', 'member'
        ))->with($meta);
    }

    public function logout()
    {
        session()->forget('user_login');
        return redirect('/');
    }

    public function login(Request $request)
    {
        $phone = $request->input('phone');
        $phone = trim($phone);

        $code = $request->input('code');
        $code = trim(strtoupper($code));

        $member = null;
        $card = null;
        $member = Member::where('phone', $phone)->where('status', true)->get();

        if ($member->count() > 0) {
            $member = $member->first();
        }

        $card = Card::where('code', $code)->where('disabled', true)->get();

        if ($card->count() > 0) {
            $card = $card->first();
        }

        if ($card && $member && AddCard::where('card_id', $card->id)->where('member_id', $member->id)->count() > 0) {
            session()->put('user_login', $member->id);
        }
        return redirect('/');
    }

    public function addCard(Request $request)
    {
        $phone = $request->input('phone');
        $phone = trim($phone);

        $code = $request->input('code');
        $code = trim(strtoupper($code));
        $recommend = $request->input('recommend');
        $recommend = trim($recommend);

        if ($recommend == $phone) {
            $recommend = null;
        }

        if (!$phone || !$code) {
            return redirect('/');
        }

        //check if code is correct and not disabled and make_card = true

        $uniqueToken = $request->input('_token').md5(time()).$phone.$code;

        Card::where('code', $code)
            ->where('make_card', true)
            ->where('disabled', false)
            ->whereNull('process')
            ->update(['process' => $uniqueToken]);

        $findCard = Card::where('make_card', true)
            ->where('disabled', false)
            ->where('process', $uniqueToken)
            ->get();
        $card = null;
        $member = null;
        $recommend_member = null;
        $point = 100;
        $gold = 100;
        if ($findCard->count() > 0) {
            $card = $findCard->first();
            try {
                Member::create([
                    'phone' => $phone,
                    'address' => 'New user with card ' . $card->code . ' address',
                    'name' => 'New user with card ' . $card->code . ' name',
                    'status' => true,
                    'point' => 0,
                    'gold' => 0
                ]);
            } catch (\Exception $e) {

            }

            Member::where('phone', $phone)
                ->whereNull('process')
                ->update(['process' => $uniqueToken]);

            $member = Member::where('process', $uniqueToken)->get();

            if ($member->count() > 0) {
                $member = $member->first();
            }
        }

        if ($member && $card) {
            if ($recommend) {
                $recommend_member = Member::where('phone', $recommend)->get();
                if ($recommend_member->count() > 0) {
                    $recommend_member = $recommend_member->first();
                    if (AddCard::where('card_id', $card->id)->where('recommend_member_id', $recommend_member->id)->count() > 0) {
                        $recommend_member = null;
                    }
                }
            }

            DB::beginTransaction();
            try {

                $add_card = AddCard::create([
                    'card_id' => $card->id,
                    'member_id' => $member->id,
                    'recommend_member_id' => ($recommend_member) ? $recommend_member->id : null
                ]);


                Transaction::create([
                    'member_id' => $member->id,
                    'event_id' => $add_card->id,
                    'gold' => $gold,
                    'point' => $point,
                    'type' => 'add_card'
                ]);

                $member->increment('point', $point);
                $member->increment('gold', $gold);

                if ($recommend_member) {

                    Transaction::create([
                        'member_id' => $recommend_member->id,
                        'event_id' => $add_card->id,
                        'gold' => $gold,
                        'point' => $point,
                        'type' => 'by_recommend'
                    ]);

                    $recommend_member->increment('point', $point);
                    $recommend_member->increment('gold', $gold);
                }

                $card->update([
                    'disabled' => true
                ]);
                $member->update([
                    'process' => null
                ]);
                session()->put('user_login', $member->id);
                DB::commit();
                return redirect('/');
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }

        return redirect('/');

    }
}
