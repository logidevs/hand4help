<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function typeOfSupports()
    {
        return $this->belongsToMany('App\TypeOfSupport', 'volunteer_type_of_support');
    }
}
