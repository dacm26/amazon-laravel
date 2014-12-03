<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    $role=Role::create([
      'name' => 'Contador'
    ]);
    $role=Role::create([
      'name' => 'Gerente'
    ]);
    $role=Role::create([
      'name' => 'Gerente Administrativo'
    ]);    
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
      Role::destroy(2);
      Role::destroy(3);
      Role::destroy(4);
	}

}
