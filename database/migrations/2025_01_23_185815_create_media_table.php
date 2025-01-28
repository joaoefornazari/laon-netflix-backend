<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function (Blueprint $table) {
			$table->id();
			$table->mediumText('name');
			$table->smallInteger('type'); // 1 - filme | 2 - série
			$table->text('original_title');
			$table->string('year', 4);
			$table->integer('duration');
			$table->text('synopsis');
			$table->string('trailer_link', 511);
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
		Schema::dropIfExists('media');
	}
}
