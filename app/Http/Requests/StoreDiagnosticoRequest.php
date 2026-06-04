<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosticoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'descripcion'           =>'required|text',
        'fecha'                 =>'required|date',
        'paciente_id'           =>'required|integer|exists:pacientes,paciente_id',
        'medico_id'             =>'required|integer|exists:medicos,medico_id',
        'gravedad'              =>'required|string|max:255',
        'recomendaciones'       =>'required|text',
        'tipo_diagnostico'      =>'required|string|max:255'
        ];
    }
}
