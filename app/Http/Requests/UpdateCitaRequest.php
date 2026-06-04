<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'fecha'                 => 'required|date',
        'motivo'                => 'required|string|max:255',
        'paciente_id'           => 'required|integer|exists:pacientes,paciente_id',
        'medico_id'             => 'required|integer|exists:medicos,medico_id',
        'estado'                => 'required|string|max:255',
        'observaciones'         => 'required|text',
        'sala'                  => 'required|string|max:255'
        ];
    }
}
