<?php

namespace Database\Seeders;

use App\Models\DataDiri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDiriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'=>'admingx',
            'birthday'=>'1999-09-02',
            'id_pegawai'=>131212,
            'id_user'=>1
        ];


        DataDiri::create($data);
    }
}
