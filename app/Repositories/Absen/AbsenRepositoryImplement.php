<?php

namespace App\Repositories\Absen;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Absen;

class AbsenRepositoryImplement extends Eloquent implements AbsenRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Absen $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
