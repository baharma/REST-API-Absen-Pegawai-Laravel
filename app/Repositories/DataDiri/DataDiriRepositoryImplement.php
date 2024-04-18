<?php

namespace App\Repositories\DataDiri;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\DataDiri;
use App\Models\User;
use Illuminate\Http\Request;

class DataDiriRepositoryImplement extends Eloquent implements DataDiriRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model,$user;

    public function __construct(DataDiri $model,User $user)
    {
        $this->user = $user;
        $this->model = $model;
    }

    public function dataDiriRegister($request){
       return  $this->model->create($request);
    }
}
