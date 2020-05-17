<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CareerResource extends JsonResource
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
            'title' => $this->title,
            'racecourse_id' => $this->racecourse_id,
            'posttime' => $this->posttime,
            'distance' => $this->distance,
            'number' => $this->number,
            'div' => $this->div,
            'dia' => $this->dia,
            'racecourse' => new RacecourseResource($this->racecourse),
            'inscriptions' => InscriptionResource::collection($this->inscriptions)
        ];
    }
}
