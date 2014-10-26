<?php

class Attribute extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required',
     'value' => 'required',
     'category_id' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];
  public function category()
  {
    return $this->belongsTo('Category');
  }
}