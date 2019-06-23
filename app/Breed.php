<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = [
        'id', 'name', 'temperament', 'life_span', 'alt_names', 'wikipedia_url', 'cfa_url', 'vetstreet_url', 'vcahospitals_url', 'country_codes', 'description', 'indoor', 'lap', 'suppressed_tail', 'origin', 'weight_imperial', 'experimental', 'hairless', 'natural', 'rare', 'rex', 'suppress_tail', 'short_legs', 'hypoallergenic', 'adaptability', 'affection_level', 'country_code', 'child_friendly', 'dog_friendly', 'energy_level', 'grooming', 'health_issues', 'intelligence', 'shedding_level', 'social_needs', 'stranger_friendly', 'vocalisation', 'weight_id',
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;

    public function weight()
    {
        return $this->belongsTo('App\Weight');
        
    }

}
