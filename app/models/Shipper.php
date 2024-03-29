<?php

class Shipper extends \Eloquent {

  
	// Add your validation rules here
		public static $rules = [
    
    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:10,70',
           'email' => 'required|email|Unique:shippers|between:10,70',
           'mobile' => 'required|regex:/^(([\d]+)[\s]*)+$/|Unique:shippers|between:8,15',
           'percentage' => 'required|regex:/^([0-9]{1,2}\.[0-9]{2})$/'
      
        ],
    'edit'   => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:10,70',
           'email' => 'required|email|between:10,70',
           'mobile' => 'required|regex:/^(([\d]+)[\s]*)+$/|between:8,15',
           'percentage' => 'required|regex:/^([0-9]{1,2}\.[0-9]{2})$/'
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

}