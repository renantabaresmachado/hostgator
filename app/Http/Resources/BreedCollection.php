<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BreedCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => 
             $this->collection->map(function ($order) use ($request) {
               return (new BreedResource($order))->toArray($request);
                 }),
            'link' => 'breed_links'
             ];
        
    }
    
}
