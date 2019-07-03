<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;

/**
 * Class BlogCategoryRepository.
 * Не может изменять/создавать сущности
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /*
     * Получить список категорий
     */
    public function getForSelectBox()
    {
//        return $this->startConditions()->all();
//
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /*
    Получить категории с пагинацией
    */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }
}
