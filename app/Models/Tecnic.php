<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnic extends Model
{
    public $timestamps = false;
    protected $table = 'staff_tecnic';

    protected $fillable = [
        'id_equip',
        'nom',
        'carrec'
    ];

    // Relació 1:n jugador i equip
    public function equip()
    {
        return $this->belongsTo(Equip::class, 'id_equip');
    }
}
