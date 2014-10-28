<?php

class Role extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required|unique:roles'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];
  
  public function employees()
  {
    return $this->hasMany('Employee');
  }
  
}