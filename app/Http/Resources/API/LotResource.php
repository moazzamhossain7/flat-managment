<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class LotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type_id' => $this->type_id,
            'supplier_id' => $this->supplier_id,
            'category_id' => $this->category_id,
            'size' => empty($this->size) ? null : $this->size,
            'qty' => $this->qty,
            'is_available' => $this->is_available,
            'type' => $this->whenLoaded('type'),
            'supplier' => $this->whenLoaded('supplier'),
            'category' => $this->whenLoaded('mainCategory'),
            'size' => $this->whenLoaded('size'),
        ];
    }
}
