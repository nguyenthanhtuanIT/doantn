<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('location', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('image_id')->unsigned();
			$table->string('code');
			$table->string('name');
			$table->string('address');
			$table->string('description', 10000);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('location');
	}
}
