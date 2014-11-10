|between:10,70<?php

class Attribute extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required|between:10,70',
     'value' => 'required|between:10,40',
     'category_id' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];
  public function category()
  {
    return $this->belongsTo('Category');
  }
}