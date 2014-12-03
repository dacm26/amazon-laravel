<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('code')->unique();
			$table->decimal('price', 11, 2);
			$table->integer('units_in_stock');
			$table->integer('threshold');
      $table->unsignedInteger('brand_id');
      $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
    	$table->unsignedInteger('category_id');
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
		Schema::drop('products');
	}

}
