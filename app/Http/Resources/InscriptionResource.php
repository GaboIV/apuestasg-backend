<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InscriptionResource extends JsonResource
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
            'weight' => $this->weight,
            'number' => $this->number,
            'position' => $this->position,
            'odd' => $this->odd,
            'status' => $this->status,
            'horse' => new HorseResource($this->horse),
            'jockey' => new JockeyResource($this->jockey),
            'trainer' => new TrainerResource($this->trainer),
        ];
    }
}
