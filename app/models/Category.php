<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|Unique:categories|between:4,70',
           'description' => 'required|between:10,150',
           'code' => 'required|regex:/^([\w]+)/|Unique:categories|between:5,12',
           'tax_free' => 'required' 
        ],
        'edit'   => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:4,70',
           'description' => 'required|between:10,150',
           'code' => 'required|regex:/^([\w]+)/|between:5,12'
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
  
    public function discounts()
  {
    return $this->hasMany('Discount');
  }
  
  public function products()
  {
    return $this->hasMany('Product');
  }
  
}