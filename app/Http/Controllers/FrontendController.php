<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Member;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Contact;
use Watson\Sitemap\Facades\Sitemap;

class FrontendController extends Controller
{
    #Sitemap
    public function sitemap()
    {
        Sitemap::addSitemap(url('sitemap_posts.xml'));
        Sitemap::addSitemap(url('sitemap_categories.xml'));
        Sitemap::addSitemap(url('sitemap_videos.xml'));

        return Sitemap::index();

    }

    public function sitemap_posts()
    {
        $contents = Post::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url($content->slug.'.html'), $content->updated_at, 'daily', '0.8');
        }
        return Sitemap::render();
    }

    public function sitemap_categories()
    {
        $contents = Category::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url($content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }

    public function sitemap_videos()
    {
        $contents = Video::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('video', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }


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

        $topPosts = Post::where('status', true)
            ->where('is_home', true)
            ->latest('updated_at')
            ->limit(5)
            ->get();

        $blogPosts = Post::where('status', true)
            ->where('is_home', true)
            ->where('is_blog', true)
            ->latest('updated_at')
            ->limit(5)
            ->get();

        $stolenCate = null;
        $writeDreamCate = null;
        $togetherCate = null;
        $donationCate = null;
        $cateList = Category::where('status', true)->whereNull('parent_id')->get();

        foreach ($cateList as $mainCate) {
            if (strpos($mainCate->slug, 'danh-cap') !==False) {
                $stolenCate = $mainCate;
            }
            if (strpos($mainCate->slug, 'viet-tiep') !==False) {
                $writeDreamCate = $mainCate;
            }
            if (strpos($mainCate->slug, 'dong-hanh') !==False) {
                $togetherCate = $mainCate;
            }
            if (strpos($mainCate->slug, 'quy-vi-benh-nhan') !==False) {
                $donationCate = $mainCate;
            }
        }


        return view('frontend.index', compact(
            'page',
            'topPosts',
            'togetherCate',
            'donationCate',
            'writeDreamCate',
            'blogPosts',
            'stolenCate'
        ))->with($meta);
    }

    public function write()
    {
        $page = 'lien-he';
        $meta = [
            'meta_title' => 'Viettiepuocmo',
            'meta_desc' => 'Viettiepuocmo',
            'meta_keywords' => 'Viettiepuocmo',
            'meta_image' => url('frontend/images/logo.png'),
            'meta_url' => route('frontend.write'),
        ];

        return view('frontend.write', compact('page'))->with($meta);
    }

    public function policy()
    {
        $page = 'lien-he';
        $meta = [
            'meta_title' => 'Viettiepuocmo',
            'meta_desc' => 'Viettiepuocmo',
            'meta_keywords' => 'Viettiepuocmo',
            'meta_image' => url('frontend/images/logo.png'),
            'meta_url' => route('frontend.policy'),
        ];

        return view('frontend.policy', compact('page'))->with($meta);
    }

    public function contact()
    {
        $page = 'lien-he';
        $meta = [];

        $meta['meta_title'] = 'Lien he';
        $meta['meta_desc'] = 'Lien he';
        $meta['meta_keywords'] = 'Lien he';
        $meta['meta_image'] = url('frontend/images/logo.png');
        $meta['meta_url'] =route('frontend.contact');


        return view('frontend.contact', compact('page'))->with($meta);
    }

    public function search(Request $request)
    {
        $page = 'search';
        if ($request->filled('q')) {


            $keyword = $request->get('q');
            $posts = Post::publish()->where('name', 'LIKE', '%' . $keyword . '%')->paginate(10);

            $meta = [];
            $meta['meta_title'] = 'Tìm kiếm cho từ khóa ' . $keyword;
            $meta['meta_desc'] = 'Tìm kiếm cho từ khóa ' . $keyword;
            $meta['meta_keywords'] = $keyword;
            $meta['meta_image'] = url('frontend/images/logo.png');
            $meta['meta_url'] = route('frontend.search');


            return view('frontend.search', compact('posts', 'keyword', 'page'))->with($meta);
        } else {
            return redirect('/');
        }
    }

    public function tag($value)
    {
        $page = 'tag';
        $meta = [];


        $tag = Tag::findBySlug($value);

        if ($tag) {
            $meta_title = ($tag->seo_name) ? $tag->seo_name : $tag->name;
            $meta_desc = $tag->desc;
            $meta_keywords = $tag->keywords;

            $posts = Post::publish()
                ->whereHas('tags', function ($q) use ($tag) {
                    $q->where('tag_id', $tag->id);
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

            $meta['meta_title'] = $meta_title;
            $meta['meta_desc'] = $meta_desc;
            $meta['meta_keywords'] = $meta_keywords;
            $meta['meta_image'] = url('frontend/images/logo.png');
            $meta['meta_url'] = route('frontend.tag', $value);

            return view('frontend.tag', compact('posts', 'tag', 'page'))->with($meta);
        } else {
            redirect('/');
        }
    }

    public function main($value)
    {
        if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {
            $post = Post::findBySlug($matches[1]);
            if ($post) {
                $post->update(['views' => (int) $post->views + 1]);
                $latestNews = Post::publish()
                    ->where('category_id', $post->category_id)
                    ->where('id', '!=', $post->id)
                    ->latest('updated_at')
                    ->limit(6)
                    ->get();

                $page = $post->category->slug;

                $meta = [];


                $meta['meta_title'] = ($post->seo_name) ? $post->seo_name : $post->name;
                $meta['meta_desc'] = $post->desc;
                $meta['meta_keywords'] = ($post->tagList) ? implode(',', $post->tagList) : null;
                $meta['meta_image'] = url($post->image);
                $meta['meta_url'] = route('frontend.main', $post->slug.'.html');

                return view('frontend.post', compact('post', 'latestNews', 'page'))->with($meta);
            } else {
                return redirect('/');
            }
        } else {
            $category = Category::findBySlug($value);

            if ($category) {
                $category->update(['views' => (int) $category->views + 1]);
                if ($category->children->count() == 0) {

                    if (Post::publish()->where('category_id', $category->id)->count() == 1) {
                        $postOnly = Post::publish()->where('category_id', $category->id)->first();
                        return redirect(url($postOnly->slug.'.html'));
                    }

                    //child categories
                    $posts = Post::publish()
                        ->where('category_id', $category->id)
                        ->latest('updated_at')
                        ->paginate(9);
                } else {
                    //parent categories
                    $posts = Post::publish()
                        ->whereIn('category_id', $category->children->pluck('id')->all())
                        ->latest('updated_at')
                        ->paginate(9);

                }
                $page = $category->slug;
                $meta = [];
                $meta['meta_title'] = ($category->seo_name) ?  $category->seo_name : $category->name;
                $meta['meta_desc'] = ($category->desc)? $category->desc : null;
                $meta['meta_keywords'] = ($category->keywords)? $category->keywords : null;
                $meta['meta_image'] = url('frontend/images/logo.png');
                $meta['meta_url'] = route('frontend.main', $category->slug);

                return view('frontend.category', compact(
                    'category', 'posts', 'page'
                ))->with($meta);
            } else {
                return redirect('/');
            }
        }
    }

    public function video($value = null)
    {
        $page = 'video';

        $meta = [];

        $meta['meta_title'] = 'Video';
        $meta['meta_desc'] = 'Video';
        $meta['meta_keywords'] = 'Video';
        $meta['meta_image'] = url('frontend/images/logo.png');
        $meta['meta_url'] =route('frontend.video');

        $mainVideo = null;
        $videos = Video::latest('updated_at')->paginate(12);
        $latestVideos = null;

        if ($value) {
            $mainVideo = Video::findBySlug($value);
            if ($mainVideo) {
                $meta_title = ($mainVideo->seo_name) ? $mainVideo->seo_name : $mainVideo->name;
                $meta_desc = $mainVideo->desc;
                $meta_keywords = $mainVideo->keywords;
                $mainVideo->update(['views' => (int)$mainVideo->views + 1]);


                $meta['meta_title'] = $meta_title;
                $meta['meta_desc'] = $meta_desc;
                $meta['meta_keywords'] = $meta_keywords;
                $meta['meta_image'] = url($mainVideo->image);
                $meta['meta_url'] = route('frontend.video', $mainVideo->slug);
                $latestVideos = Video::latest('updated_at')->limit(5)->get();
                return view('frontend.video_detail', compact('videos', 'mainVideo', 'latestVideos', 'page'))->with($meta);
            } else {
                return redirect('/');
            }
        }

        return view('frontend.video', compact('videos', 'mainVideo', 'latestVideos', 'page'))->with($meta);

    }

    public function saveContact(Request $request)
    {
        $data = $request->all();
        $redirectUrl = null;

        if (isset($data['redirect_url'])) {
            $redirectUrl = $data['redirect_url'];
            unset($data['redirect_url']);
        }

        if (!empty($data['name']) && !empty($data['email']) && !empty($data['content']) && !empty($data['phone'])) {

            Contact::create([
                'name' => isset($data['name'])? $data['name'] : "N/A",
                'email' => $data['email'],
                'phone' => $data['phone'],
                'title' => isset($data['title'])? $data['title'] : 'N/A',
                'content' => $data['content'],
                'status' => 'RECEIVE'
            ]);
        } else {
            //\Log::info($data);
        }


        if ($redirectUrl) {
            return redirect()->to($redirectUrl.'?success=1');
        }

        return redirect('/');

    }

    public function saveRegister(Request $request)
    {
        Member::create($request->all());
        return redirect('/');
    }

    public function saveComment(Request $request)
    {
        $data = $request->all();
        $redirectUrl = null;

        if (isset($data['redirect_url'])) {
            $redirectUrl = $data['redirect_url'];
            unset($data['redirect_url']);
        }

        if (!empty($data['name']) && !empty($data['email']) && !empty($data['content']) ) {

            Comment::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'content' => $data['content'],
                'post_id' => $data['post_id'],
                'status' => 'RECEIVE'
            ]);
        }


        if ($redirectUrl) {
            return redirect()->to($redirectUrl.'?success=1');
        }

        return redirect('/');

    }

    public function test() {
        sleep(10);
        return redirect()->away("https://itunes.apple.com/app/id1328462415?mt=8&pt=118554415&ct=XY+Ads");
    }

}
