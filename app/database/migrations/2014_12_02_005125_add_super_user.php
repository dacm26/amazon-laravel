<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;
class AddSuperUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    $role=Role::create([
      'name' => 'Super'
    ]);
    Employee::create([
      'name' => 'DCJJ User ',
      'email' => 'dacm8@outlook.com',
      'birthday' => Carbon::createFromDate(1990, 12, 25),
      'mobile' => 12345678,
      'gender' => 'M',
      'password' => 'admin123',
      'role_id' => $role->id      
    ]);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
     Role::destroy(1);
     Employee::destroy(1);
	}

}
