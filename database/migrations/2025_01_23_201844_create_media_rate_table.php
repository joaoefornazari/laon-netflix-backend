<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaRateTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_rate', function (Blueprint $table) {
			$table->unsignedBigInteger('media_id');
			$table->unsignedBigInteger('reviewer_id');
			$table->foreign('media_id')->references('id')->on('media');
			$table->foreign('reviewer_id')->references('id')->on('reviewer');
			$table->float('rate', places: 2);
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
		Schema::dropIfExists('media_rate');
	}
}
