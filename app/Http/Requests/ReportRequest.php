<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'conteudo' => 'required',
            'status' => [
                'required',
                Rule::in(['A', 'E', 'C'])
            ],
            'imagem' => 'nullable|image'
        ];
    }

    public function messagens()
    {
        return [
            'titulo.required' => 'O campo título é obrigatório',
            'descricao.required' => 'O campo conteúdo é obrigatório',
            'classe.required' => 'O campo classe é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'imagem.image' => 'O campo imagem deve ser preenchido com uma imagem',
            'status.in' => 'O status só pode ser Ativo ou Inativo' 
        ];
    }
}
