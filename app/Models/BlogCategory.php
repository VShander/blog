<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable
        = [
            'title',
            'alias',
            'parent_id',
            'description',
        ];

    /**
     * @return \App\Models\BlogCategory|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class,
            'parent_id', 'id');
    }

    /*
     *
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot() ? 'Корень' : '???');

        return $title;
    }
    /*
     *
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

}