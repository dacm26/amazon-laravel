<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingActiveInactiveColumnsToTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roles', function($table)
    {
      $table->boolean('inactive')->after('name');
    });
    
    Schema::table('brands', function($table)
    {
      $table->boolean('inactive')->after('name');
    });
    
    Schema::table('categories', function($table)
    {
      $table->boolean('inactive')->after('tax_free');
    });
    
     Schema::table('employees', function($table)
    {
      $table->boolean('inactive')->after('role_id');
    });   
    
    Schema::table('products', function($table)
    {
      $table->boolean('inactive')->after('category_id');
    }); 
    
    Schema::table('shippers', function($table)
    {
      $table->boolean('inactive')->after('porcentage');
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
        $table->dropColumn('inactive');
    });
    
   	Schema::table('brands', function($table)
    {
        $table->dropColumn('inactive');
    });

    Schema::table('categories', function($table)
    {
        $table->dropColumn('inactive');
    });
    
    Schema::table('employees', function($table)
    {
        $table->dropColumn('inactive');
    });
    
     Schema::table('products', function($table)
    {
        $table->dropColumn('inactive');
    });

    Schema::table('shippers', function($table)
    {
        $table->dropColumn('inactive');
    });
    
	}

}
