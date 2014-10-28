<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
     'create'   => [
        'price' => array('regex:/^[0-9]{1,3}\.[0-9]{2}$/')
        ],
		 'edit'   => [
        'price' => array('regex:/^[0-9]{1,3}\.[0-9]{2}$/')
        ],
    
    'destroy'   => [

        ]
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];
   protected $defaults = array(
     'inactive' => false,
  );

  public function __construct(array $attributes = array())
  {
      $this->setRawAttributes($this->defaults, true);
      parent::__construct($attributes);
  } 
    public function category()
  {
    return $this->belongsTo('Category');
  }
  
  public function brand()
  {
    return $this->belongsTo('Brand');
  }

}