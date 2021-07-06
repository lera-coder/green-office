<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Photo;

class PortfolioPhotoResource extends JsonResource
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
            'id' => $this->id,
            'order' => $this->order,
            'url' => Photo::find($this->photo_id)->photo_url,
            'photo_alt' => Photo::find($this->photo_id)->name
        ];
    }
}
