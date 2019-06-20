<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WeigthResource extends Resource
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
            'imperial' => $this->imperial,
            'metric' => $this->metric,
            'links' => [
            'url' => 'links of weigth'
        ]
    ];

    }
}
