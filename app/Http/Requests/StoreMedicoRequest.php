<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
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
        'nombre'                   =>'required|string|max:225',
        'apellido'                 =>'required|string|max:225',
        'especialidad'             =>'required|string|max:225',
        'telefono'                 =>'required|string|max:225',
        'email'                    =>'required|string|max:225',
        'licencia'                 =>'required|string|max:225',
        'años_experiencia'         =>'required|integer'
        ];
    }
}
