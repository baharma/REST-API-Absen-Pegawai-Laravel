<?php

namespace App\Repositories\DataDiri;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface DataDiriRepository extends Repository{

    public function dataDiriRegister($request);
}
