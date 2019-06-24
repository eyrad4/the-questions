<?php

namespace App\Repositories;


use App\Models\Category as Model;


class CategoryRepository extends CoreRepository
{
    /*
     * @return Model
     * */
    protected function getModelClass()
    {
        return Model::class;
    }

    /*
     * Get all categories list
     *
     * @return colletions
     * */
    public function getCategoryList()
    {
        $columns = ['id', 'title', 'slug'];

        return $this->startConditions()
            ->select($columns)
            ->toBase()
            ->get();
    }

    /*
     * Get single category
     *
     * @var id
     *
     * @return
     * */
    public function getCategory($id)
    {
        return $this->startConditions()
            ->find($id);
    }

}