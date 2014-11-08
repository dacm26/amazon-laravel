<?php

class Tax extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'value' => 'required|regex:/^([0-9]{1,2}\.[0-9]{2})$/'
	];

	// Don't forget to fill this array
	protected $fillable = ['value'];

}