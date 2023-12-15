<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{

    protected $table = 'leituras';
        protected $fillable = [
            'dataLeitura',
            'horaLeitura',
            'mac_id',
        ];
        public function mac()
    {
        return $this->belongsTo(Mac::class, 'mac_id', 'id');
    }
    use HasFactory;
}
