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
			$table->increments('id');

			$table->string('name', 250);
			$table->string('street', 250);
			$table->string('zipcode', 250);
			$table->string('city', 250);
			$table->string('phone', 250);
			$table->string('email', 250);
			$table->string('boat', 250);
			$table->string('storage', 250);
			$table->integer('boat_length', 11);
			$table->integer('boat_width', 11);
			$table->integer('home_service', 250)->default(0)->nullable();
			$table->integer('home_service_km', 11)->default(0)->nullable();
			$table->integer('battery_service', 11)->default(0)->nullable();
			$table->integer('outside_motor', 11)->default(0)->nullable();
			$table->integer('winter_ready', 11)->default(0)->nullable();
			$table->integer('repair_silo', 11)->default(0)->nullable();
			$table->string('storage_period', 50)->nullable();
			$table->string('storage_start', 50)->nullable();
			$table->text('remarks')->nullable();
			$table->double('total', 50)->nullable();
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
