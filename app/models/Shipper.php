<?php

class Shipper extends \Eloquent {

  
	// Add your validation rules here
		public static $rules = [
    
    'create' => [
           'name' => 'required|regex:/^([a-zA-Z]+)[\s]*/',
           'email' => 'required|email|Unique:shippers',
           'mobile' => 'required|regex:/^\+?[\d]{8,15}$/|Unique:shippers',
           'porcentage' => 'required|regex:/^[0-9]{1,2}\.[0-9]{2}/'
      
        ],
    'edit'   => [
           'name' => 'required|regex:/^([a-zA-Z]+)[\s]*/',
           'email' => 'required|email',
           'mobile' => 'required|regex:/^\+?[\d]{8,15}$/',
           'porcentage' => 'required|regex:/^[0-9]{1,2}\.[0-9]{2}/'
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