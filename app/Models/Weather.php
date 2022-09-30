<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    protected $fillable = [
      'time',
      'name',
      'latitude',
      'longitude',
      'temp_celsius' ,
      'pressure',
      'humidity',
      'temp_min',
      'temp_max',
    ];
}
