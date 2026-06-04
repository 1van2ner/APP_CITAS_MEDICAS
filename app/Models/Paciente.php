<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory;

    protected $table = 'paciente';
    protected $primaryKey = 'paciente_id';

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimieto',
        'genero',
        'telefono',
        'direccion',
        'tipo_sangre'
    ];
}
