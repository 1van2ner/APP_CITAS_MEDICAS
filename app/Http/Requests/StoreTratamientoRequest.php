<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTratamientoRequest extends FormRequest
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
        'nombre'                        => 'required|string|max:255',
        'descripcion'                   => 'required|text',
        'duracion'                      => 'required|string|max:255',
        'diagnostico_id'                => 'required|integer|exists:diagnosticos,diagnostico_id',
        'medico_id'                     => 'required|integer|exists:medicos,medico_id',
        'estado'                        => 'required|string|max:255',
        'frecuencia_administracion'     => 'required|string|max:255'
        ];
    }
}
