<?php

namespace App\Repositories;


use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository.
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'alias',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(25);

        return $result;
    }
}
