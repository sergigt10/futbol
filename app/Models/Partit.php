<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partit extends Model
{
    public $timestamps = false;
    protected $table = 'partits';

    protected $fillable = [
        'id_categoria',
        'local',
        'visitant',
        'hora',
        'marcador_local',
        'marcador_visitant'
    ];
}
