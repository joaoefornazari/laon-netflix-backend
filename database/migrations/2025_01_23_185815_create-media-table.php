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
			$table->lineString('name');
			$table->smallInteger('type'); // 1 - filme | 2 - série
			$table->string('original_title');
			$table->string('year', 4);
			$table->number('duration');
			$table->text('synopsis');
			$table->string('trailer_link');
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
