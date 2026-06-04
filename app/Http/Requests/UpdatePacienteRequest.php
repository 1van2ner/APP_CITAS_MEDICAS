<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
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
        'nombre'             => 'required|string|max:225',
        'apellido'           => 'required|string|max:225',
        'fecha_nacimieto'    => 'required|date',
        'genero'             => 'required|string|in:masculino,femenino',
        'telefono'           => 'required|string|max:20',
        'direccion'          => 'required|string|max:225',
        'tipo_sangre'        => 'required|string|max:225'
        ];
    }
}
