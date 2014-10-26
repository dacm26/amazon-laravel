<?php

class Shipper extends \Eloquent {

  
	// Add your validation rules here
		public static $rules = [
    
    'create' => [
           'name' => 'required',
           'email' => 'required|email|Unique:shippers',
           'mobile' => 'required|Integer|Unique:shippers',
           'porcentage' => 'required|Integer'
        ],
    'edit'   => [
           'name' => 'required',
           'porcentage' => 'required|Integer' 
        ]
	];
  

	// Don't forget to fill this array
	protected $guarded = ['id'];

}