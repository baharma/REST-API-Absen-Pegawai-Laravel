<?php

namespace App\Repositories\DataDiri;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface DataDiriRepository extends Repository{

    public function dataDiriRegister($request);
    public function showAllData();
    public function whereEmployee(Request $request);
}
