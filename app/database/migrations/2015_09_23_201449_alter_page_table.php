<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPageTable extends Migration {

	private $tableName = 'page';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table($this->tableName, function($table)
		{
			$table->string('slug', 200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table($this->tableName, function($table)
		{
			$table->dropColumn('slug');
		});
	}

}
