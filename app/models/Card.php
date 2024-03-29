<?php

class Card extends \Eloquent {

	// Add your validation rules here
  	// Add your validation rules here

	public static $rules = [
		    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:4,70',
           'number' => 'required|Unique:cards|between:16,20',
           'code' => 'required|between:3,5'
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
  
  public function customer()
  {
    return $this->belongsTo('Customer');
  } 
  
}