<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('city_id')->unsigned();
			$table->bigInteger('blood_type_id')->unsigned();
			$table->string('patient_name', 50);
			$table->string('patient_phone', 20);
			$table->tinyInteger('patient_age');
			$table->tinyInteger('bag_nums');
			$table->string('hospita_address');
			$table->text('notes')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
