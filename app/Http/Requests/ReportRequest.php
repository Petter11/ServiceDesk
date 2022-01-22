<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
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
            'titulo' => 'required',
            'descricao' => 'required',
            'classe' => 'required',
            'status' => [
                'required',
                Rule::in(['A', 'E', 'C'])
            ],
            'imagem' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O campo Título é obrigatório',
            'descricao.required' => 'O campo Descrição é obrigatório',
            'classe.required' => 'O campo Classe é obrigatório',
            'status.required' => 'O campo Status é obrigatório',
            'imagem.image' => 'O campo imagem deve ser preenchido com uma imagem',
            'status.in' => 'O status só pode ser Aguardando, Em correção ou Corrigido' 
        ];
    }
}
