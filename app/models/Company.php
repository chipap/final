<?php

class Company extends Eloquent
{
    protected $guarded = array('id');
	public function comcontacts()
	{
		return $this->hasMany('Comcontact');
	}	
}