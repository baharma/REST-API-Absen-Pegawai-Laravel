<?php

namespace App\Repositories\Shift;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface ShiftRepository extends Repository{

    public function createShift( $request);
    public function showAll();
}
