<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'job',
        'birthday',
        'address_id'
    ];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function employee_skill()
    {
        return $this->hasMany('App\EmployeeSkill');
    }
}
