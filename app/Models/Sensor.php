<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  protected $table = 'sensores';
    protected $fillable = [
        'nome',

    ];

    use HasFactory;
}