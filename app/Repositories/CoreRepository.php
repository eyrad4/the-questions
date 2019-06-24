<?php


namespace App\Repositories;


abstract class CoreRepository
{
    /*
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /*
    * @return mixed
    * */
    abstract protected function getModelClass();

    /*
     *  @return Model|mixed|Illuminate\Fundation\Application
     * */
    protected function startConditions()
    {
        return clone  $this->model;
    }
}