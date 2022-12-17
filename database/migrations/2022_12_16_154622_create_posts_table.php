<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('category_id')->unsigned();
			$table->bigInteger('admin_id')->unsigned();
			$table->string('title', 50);
			$table->string('image');
			$table->timestamps();
			$table->text('content');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}