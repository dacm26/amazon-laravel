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