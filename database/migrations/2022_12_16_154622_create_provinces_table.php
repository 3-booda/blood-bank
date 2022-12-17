<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvincesTable extends Migration {

	public function up()
	{
		Schema::create('provinces', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 20);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('provinces');
	}
}