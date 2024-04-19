<?php

namespace App\Repositories\Absen;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Absen;
use App\Models\DataDiri;

class AbsenRepositoryImplement extends Eloquent implements AbsenRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model,$modalDataDiri;

    public function __construct(Absen $model,DataDiri $dataDiri)
    {
        $this->modalDataDiri = $dataDiri;
        $this->model = $model;
    }


    public function create($request){
        return $this->model->create($request);
    }

    public function update($request,$id){
        return $this->model->find($id)->update($request);
    }
}
