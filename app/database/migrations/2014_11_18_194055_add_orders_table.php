<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
      $table->date('order_date');
      $table->unsignedInteger('customer_id');
      $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
      $table->unsignedInteger('shipper_id');
      $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('cascade');      
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
      Schema::drop('orders');
	}

}
