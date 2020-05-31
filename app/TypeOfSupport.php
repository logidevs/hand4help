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

        if($locale=='en'&&!is_null($this->attributes[$attribute_en]))
        {
        	return $this->attributes[$attribute_en];
        }
        elseif($locale=='al'&&!is_null($this->attributes[$attribute_al]))
        {
        	return $this->attributes[$attribute_al];
        }
        else{
        	return $this->attributes[$attribute_sr];
        }
    }
}
