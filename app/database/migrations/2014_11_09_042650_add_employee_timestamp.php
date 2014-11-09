<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddEmployeeTimestamp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roles', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    });
    
    Schema::table('brands', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    });
    
    Schema::table('categories', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    });
    
     Schema::table('employees', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    });   
    
    Schema::table('products', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    }); 
    
    Schema::table('shippers', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    });
    Schema::table('customers', function($table)
    {
      $table->string('updated_by')->after('updated_at');
    });
    Schema::table('taxes', function($table)
    {
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
    Schema::table('roles', function($table)
    {
        $table->dropColumn('updated_by');
    });
    
   	Schema::table('brands', function($table)
    {
        $table->dropColumn('updated_by');
    });

    Schema::table('categories', function($table)
    {
        $table->dropColumn('updated_by');
    });
    
    Schema::table('employees', function($table)
    {
        $table->dropColumn('updated_by');
    });
    
     Schema::table('products', function($table)
    {
        $table->dropColumn('updated_by');
    });

    Schema::table('shippers', function($table)
    {
        $table->dropColumn('updated_by');
    });
    Schema::table('customers', function($table)
    {
      $table->dropColumn('updated_by');
    });
    Schema::table('taxes', function($table)
    {
      $table->dropColumn('updated_by');
    });     
	}

}
