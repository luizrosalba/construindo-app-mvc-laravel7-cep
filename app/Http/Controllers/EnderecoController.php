<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\SalvarRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EnderecoController extends Controller
{
    public function index(){
        return view('busca'); 
    }

    public function buscar (
        Request $request 
    ){
        $cep = $request-> input ( 'cep'); 
        // dd($cep); /// mata e nao executa nada alem 
        //// printa na tela o que está usando 
        $response = Http::get("viacep.com.br/ws/$cep/json/")->json();
        // dd($response);
        return view ('adicionar')->with (
            [
                'cep' => $request->input('cep'),
                'logradouro'=> $response['logradouro'],
                'bairro'=> $response['bairro'],
                'cidade'=> $response['localidade'],
                'estado'=> $response['uf'],
            ]
        );
        
    }


    public function salvar (
        SalvarRequest $request 
    ){
      dd($request->all());
    }

}


