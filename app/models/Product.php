<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'price' => array('regex:/^[0-9]{1,3}\.[0-9]{2}$/')
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];
  
    public function category()
  {
    return $this->belongsTo('Category');
  }
  
  public function brand()
  {
    return $this->belongsTo('Brand');
  }

}