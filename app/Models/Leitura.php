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
            'sensor_id',
            'mac_id',
        ];
        public function mac()
    {
        return $this->belongsTo(Mac::class, 'mac_id', 'id');
    }
    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id', 'id');
    }
    use HasFactory;
}
