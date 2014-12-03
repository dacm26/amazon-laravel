<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
     'create'   => [
        'name' => 'required|regex:/^(([\w]+)[\s]*)+$/|Unique:products|between:3,70',
        'price' => 'required|regex:/^([0-9]{1,9}\.[0-9]{2})$/',
        'code' => 'required|regex:/^([\w]+)$/|Unique:products|between:5,12',
        'units_in_stock' => 'required|regex:/^\+?[\d]+$/|between:2,10',
        'threshold' => 'required|regex:/^\+?[\d]+$/|between:1,10',
        'image_url' => 'required'
        ],
		 'edit'   => [
        'name' => 'required|regex:/^(([\w]+)[\s]*)+$/|between:3,70',
        'price' => 'required|regex:/^([0-9]{1,9}\.[0-9]{2})$/',
        'code' => 'required|regex:/^([\w]+)$/|between:5,12',
        'units_in_stock' => 'required|regex:/^\+?[\d]+$/|between:2,10',
        'threshold' => 'required|regex:/^\+?[\d]+$/|between:1,10',
        'image_url' => 'required'
        ],
    
    'destroy'   => [

        ]
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];

  protected $defaults = array(
     'inactive' => false,
     'visits' => 0,
  );

  public function __construct(array $attributes = array())
  {
      $this->setRawAttributes($this->defaults, true);
      parent::__construct($attributes);
  } 
    public function category()
  {
    return $this->belongsTo('Category');
  }
  
  public function brand()
  {
    return $this->belongsTo('Brand');
  }
  
  public function wishlist()
  {
    return $this->belongsTo('Wishlist');
  }
  public function cart()
  {
    return $this->belongsTo('Cart');
  }  
}