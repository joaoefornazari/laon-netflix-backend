<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaGenreTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('media_genre', function (Blueprint $table) {
				$table->foreign('media_id')->references('id')->on('media');
				$table->foreign('genre_id')->references('id')->on('genre');
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
			Schema::dropIfExists('media_genre');
	}
}
