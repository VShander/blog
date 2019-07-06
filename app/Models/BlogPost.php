<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BlogPost
 *
 * @package App\Models
 *
 * @property \App\Models\BlogCategory $category
 * @property \App\Models\User         $user
 * @property string                   $title
 * @property string                   $alias
 * @property string                   $content_html
 * @property string                   $content_raw
 * @property string                   $fragment
 * @property string                   $published_at
 * @property boolean                  $is_published
 * */
class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'alias',
        'category_id',
        'fragment',
        'content_raw',
        'is_published',
        'published_at',
        'user_id'
    ];
    /**
     * Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
