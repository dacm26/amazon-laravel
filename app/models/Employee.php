<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Employee extends BaseModel implements UserInterface, RemindableInterface {
  
    use UserTrait, RemindableTrait;

  
	// Add your validation rules here
	public static $rules = [
		 'name' => 'required',
     'email' => 'required|email',
     'birthday' => 'required',
     'mobile' => 'required|min:8',
     'gender' => 'required',
     'password' => 'required|min:8',
     'role_id' => 'required'
     
	];
  

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
	protected $guarded = ['id','password'];
  
  public function role()
  {
    return $this->belongsTo('Role');
  }
  
}