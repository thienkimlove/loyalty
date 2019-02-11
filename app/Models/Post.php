<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'posts';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'desc',
        'seo_title',
        'seo_desc',
        'slug',
        'category_id',
        'status',
        'image',
        'content',
        'views',
        'user_id',
        'author',
        'is_home',
        'is_top',
        'is_blog'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }

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

    public function user()
    {
        return $this->belongsTo(BackpackUser::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // The slug is created automatically from the "name" field if no slug exists.
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }

    public function getTagListAttribute()
    {
        return $this->tags()->pluck('name')->all();
    }

    public function scopePublish($query)
    {
        $query->where('status', true);
    }

    public function viewInSite($crud = false)
    {
        return '<a class="btn btn-xs btn-default" target="_blank" href="'.url($this->slug).'.html" data-toggle="tooltip"><i class="fa fa-search"></i>View in Site</a>';
    }

    public function getRelatedPostsAttribute()
    {
        $limit = 5;

        $post_tag = $this->tags()->pluck('tag_id')->all();

        $postIds = Post::where('status', true)
            ->whereHas('tags', function($q) use ($post_tag){
                $q->whereIn('tag_id', $post_tag);
            })
            ->where('id', '!=', $this->id)
            ->latest('updated_at')
            ->limit($limit)
            ->pluck('id')
            ->all();

        $additionPosts = null;

        if (count($postIds) < $limit) {
            $categoryLimit = $limit - count($postIds);
            $postIds +=Post::where('status', true)
                ->where('category_id', $this->category_id)
                ->where('id', '!=', $this->id)
                ->latest('updated_at')
                ->limit($categoryLimit)
                ->pluck('id')
                ->all();
        }
        return Post::whereIn('id', $postIds)->get();
    }
}
