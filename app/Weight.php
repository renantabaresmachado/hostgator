<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = [
        'id', 'imperial', 'metric',
    ];

    public function breed()
    {
        return $this->hasOne('App\Breed');
        
    }

}
