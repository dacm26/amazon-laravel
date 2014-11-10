<?php

class Role extends \Eloquent {

	// Add your validation rules here
  	// Add your validation rules here
	public static $rules = [
    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|Unique:roles',
        ],
    
   'edit'   => [
       'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/',
        ],
    'destroy'   => [

        ]
     	];
  protected $defaults = array(
     'inactive' => false,
    'updated_by'=>' '
  );

  public function __construct(array $attributes = array())
  {
      $this->setRawAttributes($this->defaults, true);
      parent::__construct($attributes);
  }
	// Don't forget to fill this array
	protected $fillable = ['name'];
  
  public function employees()
  {
    return $this->hasMany('Employee');
  }
  
}