<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NasionalDay extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'holiday_date',
        'holiday_name',
        'is_national_holiday'
    ];
}
