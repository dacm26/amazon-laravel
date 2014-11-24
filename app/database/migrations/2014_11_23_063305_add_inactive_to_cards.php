<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddInactiveToCards extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cards', function($table)
    {
      $table->boolean('inactive')->after('customer_id');
    });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cards', function($table)
    {
        $table->dropColumn('inactive');
    });
	}

}
