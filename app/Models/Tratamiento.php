<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    /** @use HasFactory<\Database\Factories\TratamientoFactory> */
    use HasFactory;

    protected $table = 'tratamiento';
    protected $primaryKey = 'tratamiento_id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'diagnostico_id',
        'medico_id',
        'estado',
        'frecuencia_administracion'
    ];

    public function Diagnostico()
    {
        return $this->belongsTo(Diagnostico::class, 'diagnostico_id','diagnostico_id');
    }

    public function Medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id','medico_id');
    }
}
