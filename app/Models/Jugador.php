<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    public $timestamps = false;
    protected $table = 'jugadors';

    protected $fillable = [
        'id_equip',
        'nom',
        'dorsal',
        'posicio'
    ];
}
