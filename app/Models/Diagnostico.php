<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    /** @use HasFactory<\Database\Factories\DiagnosticoFactory> */
    use HasFactory;

    protected $table = 'diagnostico';
    protected $primaryKey = 'diagnostico_id';

    protected $fillable = [
        'descripcion',
        'fecha',
        'paciente_id',
        'medico_id',
        'gravedad',
        'recomendaciones',
        'tipo_diagnostico'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id','paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id','medico_id');
    }

}
