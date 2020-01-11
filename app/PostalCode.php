<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $fillable = [
        'postal_code',
        'municipality',
        'colony',
        'state',
        'country'
    ];

    public function address()
    {
        return $this->hasMany('App\Address');
    }
}
