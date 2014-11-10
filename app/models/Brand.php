<?php

class Brand extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|Unique:brands|between:4,70',
        ],
    
   'edit'   => [
       'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:4,70',
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