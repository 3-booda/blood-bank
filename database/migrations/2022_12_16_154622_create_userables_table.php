<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserablesTable extends Migration {

	public function up()
	{
		Schema::create('userables', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('userable_id');
			$table->string('userable_type');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('userables');
	}
}