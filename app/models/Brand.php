<?php

class Brand extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
    'create/edit' => [
           'name' => 'required|unique:roles',
        ],
    'destroy'   => [

        ]
     	];
  protected $defaults = array(
     'inactive' => false,
  );

  public function __construct(array $attributes = array())
  {
      $this->setRawAttributes($this->defaults, true);
      parent::__construct($attributes);
  }
	// Don't forget to fill this array
	protected $guarded = ['id'];
  
  public function products()
  {
    return $this->hasMany('Product');
  }
  

}