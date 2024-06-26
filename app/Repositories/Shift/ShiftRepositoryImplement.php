<?php

namespace App\Repositories\Shift;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftRepositoryImplement extends Eloquent implements ShiftRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Shift $model)
    {
        $this->model = $model;
    }

    public function createShift($request)
    {
        return $this->model->create($request);
    }

    public function showAll()
    {
        return $this->model->all();
    }
}
