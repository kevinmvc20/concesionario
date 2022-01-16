<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ci' => "required|numeric",
            'nombre' => "required|max:200|string|min:1|not_regex:/^[0-9_+°\s]{0,200}$/",
            'email' => "required|max:50|email",
            'direccion' => "nullable|max:200|string|regex:/^[a-zA-Z0-9_áéíóúñÁÉÍÓUÑ°\s]{0,200}$/",
            'telefono' => "nullable|max:20|regex:/^[0-9_+°\s]{0,200}$/"
        ];
    }
}
