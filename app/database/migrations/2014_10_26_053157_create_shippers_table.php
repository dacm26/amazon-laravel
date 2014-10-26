<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->bigInteger('mobile')->unique();
			$table->string('email')->unique();
			$table->double('porcentage');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shippers');
	}

}
