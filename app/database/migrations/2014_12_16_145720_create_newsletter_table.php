<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('newsletters', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title', 250);
            $table->text('images');
            $table->integer('send_to');
            $table->integer('catalog_id');
            $table->integer('user_id');
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
        Schema::drop('newsletters');
	}

}
