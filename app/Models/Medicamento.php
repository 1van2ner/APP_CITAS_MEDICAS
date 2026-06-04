<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    /** @use HasFactory<\Database\Factories\MedicamentoFactory> */
    use HasFactory;

    protected $table = 'medicamentos';
    protected $primaryKey = 'medicamentos_id';

    protected $fillable = [
        'nombre',
        'dosis',
        'frecuencia',
        'duracion',
        'tratamiento_id',
        'proveedor',
        'efectos_secundarios'
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'tratamiento_id','tratamiento_id');
    }
}
