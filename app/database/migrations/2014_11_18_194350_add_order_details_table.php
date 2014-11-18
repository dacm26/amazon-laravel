<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddOrderDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_details', function(Blueprint $table)
		{
			$table->increments('id');
      $table->unsignedInteger('order_id');
      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');         
      $table->unsignedInteger('product_id');
      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
      $table->unsignedInteger('quantity');	
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
        Schema::drop('order_details');
	}

}
