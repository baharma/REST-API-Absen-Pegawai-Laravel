<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'data_diris';
    protected $fillable = [
        'name',
        'birthday',
        'id_pegawai',
        'id_user'
    ];

    public function users(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
