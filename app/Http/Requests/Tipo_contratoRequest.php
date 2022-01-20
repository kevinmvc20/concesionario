<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tipo_contratoRequest extends FormRequest
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
            'tipo'=> "required|max:200|string|min:1",
            'descripcion'=> "nullable|max:300|string|regex:/^[a-zA-Z0-9_áéíóúñÁÉÍÓUÑ°\s]{0,200}$/"
        ];
    }
}
