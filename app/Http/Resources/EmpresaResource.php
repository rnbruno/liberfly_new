<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'empresas_name' => $this->empresas_name,
            'empresa_id_novo' => $this->empresa_id_novo,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'user_id_novo' => $this->user_id_novo,
        ];
    }
}
