<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill'
    ];

    public function employee_skill()
    {
        return $this->hasMany('App\EmployeeSkill');
    }
}
