<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicamentoRequest extends FormRequest
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
        'nombre'                    => 'required|string|max:225',
        'dosis'                     => 'required|string|max:225',
        'frecuencia'                => 'required|string|max:225',
        'duracion'                  => 'required|string|max:225',
        'tratamiento_id'            => 'required|integer|exists:tratamiento,tratamiento_id',
        'proveedor'                 => 'required|string|max:225',
        'efectos_secundarios'       => 'required|string|max:225'
        ];
    }
}
