<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requester extends Model
{
    public function typeOfSupports()
    {
        return $this->belongsToMany('App\TypeOfSupport', 'requester_type_of_support');
    }
}
