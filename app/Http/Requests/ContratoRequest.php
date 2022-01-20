<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
            'numero' => "required|regex:/^[0-9_+°\s]{0,200}$/",
            'descripcion' => "nullable|string|regex:/^[a-zA-Z0-9_áéíóúñÁÉÍÓUÑ°\s]{0,200}$/",
        ];
    }
}
