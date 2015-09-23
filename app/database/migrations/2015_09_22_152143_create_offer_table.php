<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration {

	protected $tableName = 'offers';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tableName, function(Blueprint $table) {
			$table->increments('id')->key();

			$table->string('name', 250);
			$table->string('street', 250);
			$table->string('zipcode', 250);
			$table->string('city', 250);
			$table->string('phone', 250);
			$table->string('email', 250);
			$table->string('boat', 250);
			$table->string('storage', 250);
			$table->integer('boat_length');
			$table->integer('boat_width');
			$table->integer('home_service')->nullable();
			$table->integer('home_service_km')->nullable();
			$table->integer('battery_service')->nullable();
			$table->integer('outside_motor')->nullable();
			$table->integer('winter_ready')->nullable();
			$table->integer('repair_silo')->nullable();
			$table->string('storage_period')->nullable();
			$table->string('storage_start')->nullable();
			$table->text('remarks')->nullable();
			$table->double('total')->nullable();
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
		Schema::drop($this->tableName);
	}

}
