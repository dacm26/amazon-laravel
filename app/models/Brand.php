<?php

class Brand extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];

}