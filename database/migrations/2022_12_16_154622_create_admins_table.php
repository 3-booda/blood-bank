<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('phone', 20)->unique();
            $table->string('email')->unique();
            $table->string('password');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}
