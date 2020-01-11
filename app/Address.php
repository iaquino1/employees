<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'number',
        'postal_code_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Employee');
    }
    public function postal_code()
    {
        return $this->belongsTo('App\PostalCode');
    }
}
