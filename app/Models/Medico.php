<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\MedicoFactory> */
    use HasFactory;

    protected $table = 'medico';
    protected $primaryKey = 'medico_id';

    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'telefono',
        'email',
        'licencia',
        'años_experiencia'
    ];
}
