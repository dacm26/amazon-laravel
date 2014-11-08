<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Employee extends Eloquent implements UserInterface, RemindableInterface {
  
    use UserTrait, RemindableTrait;

  
	// Add your validation rules here
	public static $rules = [
    
    'create' => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/',
           'email' => 'required|email|Unique:employees',
           'birthday' => 'required',
           'mobile' => 'required|regex:/^\+?[\d]{8,15}$/|Unique:employees',
           'gender' => 'required',
           'password' => 'required',
           'role_id' => 'required' 
        ],
    'edit'   => [
           'name' => 'required|regex:/^(([a-zA-Z]+)[\s]*)+$/',
           'email' => 'required|email',
           'birthday' => 'required',
           'mobile' => 'required|regex:/^\+?[\d]{8,15}$/',
           'role_id' => 'required' 
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
	protected $table = 'employees';

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
  public function role()
  {
    return $this->belongsTo('Role');
  }
  
}