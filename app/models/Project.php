<?php

class Project extends Eloquent 
{
	
	protected $guarded = array('id');
   
	public function delete()
	{
		#Delete the Comments
		$this->comments()->delete();
		#Delete the Project
		return parent::delete();
	}

	public function description()
	{
		return n12br($this->description);
	}


}

