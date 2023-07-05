<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'area_name' => $this->area_name,
            'shops'=>$this->shops
        ];
    }
}
