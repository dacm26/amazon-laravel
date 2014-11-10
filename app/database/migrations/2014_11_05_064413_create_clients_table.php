<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->bigInteger('mobile')->unique();;
			$table->string('email')->unique();
			$table->string('adress');
			$table->biginteger('zipcode');
			$table->date('birthday');
			$table->string('gender');
			$table->string('password');
			$table->string('cardid');
			$table->Integer('csv');
			$table->date('carddate');
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
		Schema::drop('clients');
	}

}
