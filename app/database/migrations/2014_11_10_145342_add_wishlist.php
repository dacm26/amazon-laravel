<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddWishlist extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wishlists', function(Blueprint $table)
		{
      $table->increments('id');
			$table->unsignedInteger('customer_id');
      $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->unsignedInteger('product_id');
      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');            
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
		Schema::create('wishlists', function(Blueprint $table)
		{
			Schema::drop('wishlists');
		});
	}

}
