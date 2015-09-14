<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainPicColumnToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('cars', function($table)
        {
            $table->integer('main_pic')->after('youtube');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('cars', function($table)
        {
            $table->dropColumn('main_pic');
        });
	}

}
