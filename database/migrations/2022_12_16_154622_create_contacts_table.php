<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned();
			$table->string('subject', 50);
			$table->text('message');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
