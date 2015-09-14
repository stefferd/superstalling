<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTable extends Migration {

    protected $tableName = 'cars';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create($this->tableName, function(Blueprint $table) {
            $table->increments('id');

            $table->string('brand', 250);
            $table->string('engine', 250);
            $table->string('make', 250);
            $table->string('milage', 250);
            $table->string('type', 250);
            $table->string('transmission', 250);
            $table->string('status', 250);
            $table->string('location', 250);
            $table->string('price', 250);
            $table->string('youtube', 250);
            $table->integer('user_id');
            $table->integer('catalog_id');
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
