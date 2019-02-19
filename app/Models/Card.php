<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Card extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'cards';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'code', 'disabled', 'make_card', 'process'
    ];
    protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getNumber()
    {
        $ars = str_split($this->id);
        return $this->code.end($ars);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public static function exportToExcel($exportIds=[])
    {
        ini_set('memory_limit', '2048M');

        if (!$exportIds) {
            $cards = Card::where('make_card', false)->limit(100)->get();
        } else {
            $cards = Card::where('make_card', false)->whereIn('id', $exportIds)->get();
        }

        Card::whereIn('id', $cards->pluck('id')->all())->update(['make_card'=> true]);

        $objReader = IOFactory::createReader('Xlsx');
        $objPHPExcel = $objReader->load(resource_path('templates/cards.xlsx'));

        $row = 2;
        foreach ($cards as $card) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $row - 1)
                ->setCellValue('B'.$row, $card->code);
            $row++;
        }

        $objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');
        $path = 'cards_'.date('Y_m_d_His').'.xlsx';
        $objWriter->save(storage_path('app/public/' . $path));
        return url('/storage/' . $path);
    }

}
