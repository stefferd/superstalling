<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

    private $table_name = 'users';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->table_name, function(Blueprint $table) {
            $table->increments('id');

            $table->string('name', 250);
            $table->string('email', 250)->unique();
            $table->integer('level');
            $table->string('password', 64);

            $table->string('remember_token', 100)->nullable();

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
		Schema::drop($this->table_name);
	}

}
