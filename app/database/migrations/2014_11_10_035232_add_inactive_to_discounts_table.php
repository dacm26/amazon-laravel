


<?php
/**
	 * Agrega inactive y updated by
	 *
	 * 
	 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddInactiveToDiscountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('discounts', function($table)
    {
      $table->boolean('inactive')->after('discount');
      $table->string('updated_by')->after('updated_at');
    });
    
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('discounts', function($table)
    {
        $table->dropColumn('inactive');
        $table->dropColumn('updated_by');
    });
	}

}
