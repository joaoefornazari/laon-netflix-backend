<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaAwardTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_award', function (Blueprint $table) {
			$table->unsignedBigInteger('media_id');
			$table->unsignedBigInteger('award_id');
			$table->foreign('media_id')->references('id')->on('media');
			$table->foreign('award_id')->references('id')->on('award');
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
		Schema::dropIfExists('media_award');
	}
}
