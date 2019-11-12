<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

/**
 * Class MainRepository
 * @package App/Repositories
 * @property Model model
 */
abstract class MainRepository
{
    /**@var Model * */
    protected $model;

    /**
     * MainRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * Get Model Class name
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * Get clone Model
     * @return Model
     */
    protected function startCondition(): ?Model
    {
        return clone $this->model;
    }
}
