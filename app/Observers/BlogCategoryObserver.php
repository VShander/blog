<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the blog category "creating" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     *
     * @return void
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->selAlias($blogCategory);
    }
    /**
     * Handle the blog category "created" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     *
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog post "updating" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogCategory $blogCategory)
    {
        $this->selAlias($blogCategory);
    }
    /**
     * Handle the blog category "updated" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     *
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     *
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "restored" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     *
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     *
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
    //main functions
    // -------------------------------------------------------------------------
    protected function selAlias(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->alias)) {
            $blogCategory->alias = Str::slug($blogCategory->title);
        }
    }
}
