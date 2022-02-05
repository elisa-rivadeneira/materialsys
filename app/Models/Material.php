<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'relationship',
        'description',
        'oty_fm',
        'e_bom',
        'fmr',
        'pt',
        'ubicacion',
        'destino'
    ];

}
