<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Medico;

class Cita extends Model
{
    /** @use HasFactory<\Database\Factories\CitaFactory> */
    use HasFactory;

    protected $table = 'cita';
    protected $primaryKey = 'cita_id';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'motivo',
        'paciente_id',
        'medico_id',
        'estado',
        'observaciones',
        'sala'
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
