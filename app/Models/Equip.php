<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equip extends Model
{
    public $timestamps = false;
    protected $table = 'equips';

    protected $fillable = [
        'categoria',
        'link_resultats',
        'link_classificacio',
        'slug',
        'imatge'
    ];
}
