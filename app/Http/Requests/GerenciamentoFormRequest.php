<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GerenciamentoFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required'],
            'localizacao'=>['required'],
            'categoria'=>['required'],
            'data'=>['required'],
            //'arquivo'=>['required']
        ];
    }
    public function messages()
    {
        return[
            'nome.required'=>'O campo Nome é obrigatório',
            'localizacao.required'=>'O campo Localizacao é obrigatório',
            'categoria.required'=>'O campo Categoria é obrigatório',
            'data.required'=>'O campo Data é obrigatório',
            'arquivo.required'=>'O campo Arquivo é obrigatório'
        ];
    }
}
