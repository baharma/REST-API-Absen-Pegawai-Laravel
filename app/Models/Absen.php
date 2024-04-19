<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'clock_out',
        'clock_in',
        'date',
        'status'
    ];

    public function dataDiri(){
        return $this->belongsToMany(Absen::class,'has_absens','id_absen','id_data_diri');
    }
    public function shiftDiri(){
        return $this->hasOne(Shift::class,'id','id_absens');
    }
}
