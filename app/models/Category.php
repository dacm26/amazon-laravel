<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'create' => [
           'name' => 'required',
           'description' => 'required',
           'code' => 'required|Unique:categories',
           'tax_free' => 'required' 
        ],
        'edit'   => [
           'name' => 'required',
           'description' => 'required'
        ]
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];
  
  public function attributes()
  {
    return $this->hasMany('Attribute');
  }
  
}