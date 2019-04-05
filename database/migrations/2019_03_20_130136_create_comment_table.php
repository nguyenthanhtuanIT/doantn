<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('comment', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('tour_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->string('content');
			$table->Integer('KT');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('comment');
	}
}
