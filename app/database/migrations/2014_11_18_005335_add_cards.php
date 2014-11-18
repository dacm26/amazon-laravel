<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCards extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('name');
      $table->bigInteger('number')->unique();
      $table->date('expiration_date');
      $table->smallInteger('code');
      $table->double('balance');
      $table->double('frozen_balance');
      $table->unsignedInteger('customer_id');
      $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->timestamps();
      $table->string('updated_by');	      
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::drop('cards');
	}

}
