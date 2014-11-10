<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Client extends Eloquent implements UserInterface, RemindableInterface {
  
    use UserTrait, RemindableTrait;

  
	// Add your validation rules here
	public static $rules = [
    
    'create' => [
           'name' => 'required',
           'mobile' => 'required|Integer|Unique:clients',
           'email' => 'required|email|Unique:clients',
           'adress' => 'required',
           'zipcode' => 'required',
           'birthday' => 'required',
           'gender' => 'required',
           'password' => 'required',
           'cardid' => 'required',
           'csv' => 'required',
           'carddate' => 'required',
        ],
    'edit'   => [
           'name' => 'required',
           'birthday' => 'required',
           
        ]
	];
  

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	// Don't forget to fill this array
	protected $guarded = ['id'];
  
  public function setPasswordAttribute($pass){
      $this->attributes['password'] = Hash::make($pass);
  }

}