<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'nombre'=> "required|max:200|string|min:1",
            'precio'=>"required",
            'color'=> "required|max:50|string|min:1",
            'año'=> "required",
            'nro_chasis'=> "required"
        ];
    }
}
