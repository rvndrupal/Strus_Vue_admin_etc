<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST': {
                return [
                    //'nom' => 'required|min:2|unique:products',
                    'foto' => 'required|mimes:jpeg,bmp,png,jfif|max:500',
                    // 'nom' => 'required|min:2',
                    // 'ap' => 'required|min:2',
                    // 'am' => 'required|min:2',
                    // 'paises_id' => 'required',
                    // 'rfc' => 'required|min:12|max:13',
                    // 'curp' => 'required|min:18|max:18',
                    // 'correo_per' => 'required|email',
                    // 'correo_ins' => 'required|email',
                    // 'tel_casa' => 'required|numeric|min:10|max:11',
                    // 'tel_movil' => 'required|numeric|min:10|max:11',
                    // 'tel_movil' => 'required|numeric|min:10|max:11',


                     'paises_id' => 'required',
                     'estado_civils_id' => 'required',





                ];
            }
            // case 'PUT': {
            //     return [
            //         'name' => 'required|unique:products,name,'.$this->id.'|min:2',
            //         'description' => 'required|min:10',
            //         'price' => 'required|numeric',
            //         'stock' => 'required|numeric',
            //         'category_id' => [
            //             'required',
            //             Rule::exists('categories', 'id')
            //         ],
            //         'tags' => 'required|array',
            //     ];
            // }
        }
    }
}
