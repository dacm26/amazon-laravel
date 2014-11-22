<?php

class Wishlist extends \Eloquent {
	protected $guarded = ['id'];
    public function products()
  {
    return $this->hasMany('Product');
  }

    public function customers()
  {
    return $this->hasMany('Customer');
  }
}