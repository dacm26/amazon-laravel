<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
     'create'   => [
        'name' => 'required|regex:/^(([\w]+)[\s]*)+$/|Unique:products',
        'price' => 'required|regex:/^([0-9]{1,3}\.[0-9]{2})$/',
        'code' => 'required|regex:/^([\w]+)$/|Unique:products',
        'units_in_stock' => 'required|regex:/^\+?[\d]+$/',
        'threshold' => 'required|regex:/^\+?[\d]+$/'
        ],
		 'edit'   => [
        'name' => 'required|regex:/^(([\w]+)[\s]*)+$/',
        'price' => 'required|regex:/^([0-9]{1,3}\.[0-9]{2})$/',
        'code' => 'required|regex:/^([\w]+)$/',
        'units_in_stock' => 'required|regex:/^\+?[\d]+$/',
        'threshold' => 'required|regex:/^\+?[\d]+$/'
        ],
    
    'destroy'   => [

        ]
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];
   protected $defaults = array(
     'inactive' => false,
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

}