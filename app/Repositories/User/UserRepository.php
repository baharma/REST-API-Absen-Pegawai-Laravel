<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    public function userRegister(Request $request);
    public function userDelete(Request $request);
    public function useUpdate(Request $request);
}
