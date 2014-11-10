<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customer extends Eloquent implements UserInterface, RemindableInterface {
  
  use UserTrait, RemindableTrait;
	// Add your validation rules here
	public static $rules = [
    
    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:10,70',
           'email' => 'required|email|Unique:customers|between:10,70',
           'birthday' => 'required',
           'mobile' => 'required|regex:/^\+?[\d]{8,15}$/|Unique:customers|between:8,15',
           'gender' => 'required',
           'password' => 'required|between:6,25',
           'address' => 'required|between:10,100',
           'postal_code' => 'required|regex:/^\+?[\d]{5,15}$/'
        ],
    'edit'   => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/|between:10,70',
           'email' => 'required|email|between:10,70',
           'birthday' => 'required',
           'mobile' => 'required|regex:/^\+?[\d]{8,15}$/|between:8,15',
           'address' => 'required|between:10,100',
           'postal_code' => 'required|regex:/^\+?[\d]{5,15}$/'
        ],
        'destroy'   => [

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
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';

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
  public function wishlist()
  {
    return $this->belongsTo('Wishlist');
  }
  
}