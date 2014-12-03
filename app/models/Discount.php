<?php

class Discount extends \Eloquent {

	// Add your validation rules here
  	// Add your validation rules here
	public static $rules = [
    'create' => [
              'discount' => 'required|regex:/^([0-9]{1,9}\.[0-9]{2})$/',
              'datestart' => 'required',
              'dateend' => 'required',
              'brand_id' => 'required',
              'category_id' => 'required',
        ],
    
   'edit'   => [
              'discount' => 'required|regex:/^([0-9]{1,9}\.[0-9]{2})$/',
              'datestart' => 'required',
              'dateend' => 'required',
              'brand_id' => 'required',
              'category_id' => 'required',
        ],
    'destroy'   => [

        ]
     	];
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