<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Supplier extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'supplier_id' => $this->supplier_id,
            'delivery_id' => $this->delivery_id,
            'delivery_date' => $this->delivery_date
        ];
    }
}
