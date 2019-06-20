<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BreedResource extends Resource
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
            'weigth' => new WeigthResource($this->weigth),
            'id' => $this->id,
            'name' => $this->name,
            'temperament' => $this->temperament,
            'life_span' => $this->life_span,
            'alt_names' => $this->alt_names,
            'wikipedia_url' => $this->wikipedia_url,
            'cfa_url' => $this->cfa_url,
            'vetstreet_url' => $this->vetstreet_url,
            'vcahospitals_url' => $this->vcahospitals_url,
            'country_codes' => $this->country_codes,
            'description' => $this->description,
            'indoor' => $this->indoor,
            'lap' => $this->lap,
            'suppressed_tail' => $this->suppressed_tail,
            'origin' => $this->origin,
            'weight_imperial' => $this->weight_imperial,
            'experimental' => $this->experimental,
            'hairless' => $this->hairless,
            'natural' => $this->natural,
            'rare' => $this->rare,
            'rex' => $this->rex,
            'suppress_tail' => $this->suppress_tail,
            'short_legs' => $this->short_legs,
            'hypoallergenic' => $this->hypoallergenic,
            'adaptability' => $this->adaptability,
            'affection_level' => $this->affection_level,
            'country_code' => $this->country_code,
            'child_friendly' => $this->child_friendly,
            'dog_friendly' => $this->dog_friendly,
            'energy_level' => $this->energy_level,
            'grooming' => $this->grooming,
            'health_issues' => $this->health_issues,
            'intelligence' => $this->intelligence,
            'shedding_level' => $this->shedding_level,
            'social_needs' => $this->social_needs,
            'stranger_friendly' => $this->stranger_friendly,
            'vocalisation' => $this->vocalisation,
            'links' => [
            'url' => route('show_usuario', ['id' => $this->id])
        ]
    ];

    }
}
