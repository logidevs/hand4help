<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfSupport extends Model
{
	public function getNameAttribute(){
		return $this->getTranslate('name');
	}
    public function getTranslate($attribute)
    {
        $attribute_en=$attribute."_en";
        $attribute_al=$attribute."_al";
        $attribute_sr=$attribute."_sr";
        $locale=app()->getLocale();

        if($locale=='sr'&&!is_null($this->attributes[$attribute_sr]))
        {
        	return $this->attributes[$attribute_sr];
        }
        elseif($locale=='al'&&!is_null($this->attributes[$attribute_al]))
        {
        	return $this->attributes[$attribute_al];
        }
        else{
        	return $this->attributes[$attribute_en];
        }
    }
    public function volunteers()
    {
        return $this->belongsToMany('App\Volunteer', 'volunteer_type_of_support');
    }
    public function requesters()
    {
        return $this->belongsToMany('App\Requester', 'requester_type_of_support');
    }
}
