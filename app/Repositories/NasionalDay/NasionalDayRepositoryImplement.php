<?php

namespace App\Repositories\NasionalDay;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\NasionalDay;

class NasionalDayRepositoryImplement extends Eloquent implements NasionalDayRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(NasionalDay $model)
    {
        $this->model = $model;
    }

    public function getAllNasionalDay(){
        return $this->model->all();
    }
}
