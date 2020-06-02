<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RacecourseResource extends JsonResource
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
            'name' => $this->name,
            'country' => $this->location,
            'country_image' => url("api/images/countries/" . $this->location . ".png"),
            'careers' => CareerSimpleResource::collection($this->careers),
            'careers_count' => count($this->careers)
        ];
    }
}
