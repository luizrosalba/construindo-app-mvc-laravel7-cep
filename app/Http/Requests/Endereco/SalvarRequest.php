<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Foundation\Http\FormRequest;



class SalvarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /// regras de usuario logado 
        return true ; /// deixa passar qquer requisicao
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /// regras da request 

        return [
            'cep'=> 'required|string',
            'logradouro'=> 'required|string',
            'numero'=> 'required|string',
            'bairro'=> 'required|string',
            'cidade'=> 'required|string',
            'estado'=> 'required|string',
        ];
    }
}
