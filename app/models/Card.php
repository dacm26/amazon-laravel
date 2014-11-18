<?php

class Card extends \Eloquent {

	// Add your validation rules here
  	// Add your validation rules here


	// Don't forget to fill this array
	protected $guarded = ['id'];
  
  public function customer()
  {
    return $this->belongsTo('Customer');
  } 
  
}