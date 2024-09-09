<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioPessoaResource extends JsonResource
{
    /**
    *@param \Illuminate\Http\Request $request
    *@return array |Illuminate\Contracts\Support\Arrayable\JsonSeriazable
     */
    public function toArray($request)
    {
        return [
            'usuario_id' => $this->usuario_id,
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'pessoa_id' => $this->pessoa_id,
            'pessoa_inativo' => $this->pessoa_inativo,
            // Adicione outros campos conforme necessário
        ];
    }

}