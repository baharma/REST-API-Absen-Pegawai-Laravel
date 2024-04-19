<?php

namespace App\Repositories\Absen;

use LaravelEasyRepository\Repository;

interface AbsenRepository extends Repository{


    public function create($request);
    public function update($request,$id);
}
