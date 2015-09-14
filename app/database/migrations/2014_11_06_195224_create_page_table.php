<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {


    private $tableName = 'page';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create($this->tableName, function(Blueprint $table) {
            $table->increments('id');


            $table->string('title', 250);
            $table->text('content')->nullable();
            $table->integer('user_id');
            $table->string('keywords', 250);
            $table->text('description');
            $table->smallInteger('type')->default(1);
            $table->smallInteger('start')->default(1);
            $table->smallInteger('active')->default(1);
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
