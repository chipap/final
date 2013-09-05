<?php

class Comcontact extends Eloquent
{
    protected $table = 'comcontacts';
    protected $guarded = array('id');
    public function company()
	{
		return $this->belongsTo('Company');
	}	
	
}