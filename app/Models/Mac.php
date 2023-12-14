<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $table = 'macs';
    protected $fillable = ['nome, contador,'];
    use HasFactory;
}
