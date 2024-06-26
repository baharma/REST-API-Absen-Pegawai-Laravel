<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'=>'admingx',
            'email'=>'admin@gtmail.com',
            'password'=>'admingx2024'
        ];

        User::create($data);
    }
}
