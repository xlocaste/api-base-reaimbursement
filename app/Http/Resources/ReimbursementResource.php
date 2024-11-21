<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReimbursementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id,
            'user_id' => $this -> user_id,
            'tanggal' => $this -> tanggal,
            'kategori' => $this -> kategori,
            'deskripsi' => $this -> deskripsi,
            'jumlah' => $this -> jumlah,
            'status' => $this -> status,
            'tanggal_approval' => $this -> tanggal_approval,
            'approval_by' => $this -> approval_by,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,

            'user' => new UserResource($this->whenLoaded('user')),
            'approvalBy' => new UserResource($this->whenLoaded('approvalBy')),
        ];
    }
}
