<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'create' => [
           'name' => 'required|regex:/^([a-zA-Z]+)[\s]*/',
           'description' => 'required',
           'code' => 'required|regex:/^([\w]+)/|Unique:categories',
           'tax_free' => 'required' 
        ],
        'edit'   => [
           'name' => 'required|regex:/^([a-zA-Z]+)[\s]*/',
           'description' => 'required'
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
  
  public function attributes()
  {
    return $this->hasMany('Attribute');
  }
  
  public function products()
  {
    return $this->hasMany('Product');
  }
  
}