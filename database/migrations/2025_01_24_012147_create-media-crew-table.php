<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaCrewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_crew', function (Blueprint $table) {
					$table->unsignedBigInteger('media_id');
					$table->unsignedBigInteger('person_id');
					$table->foreign('media_id')->references('id')->on('media');
					$table->foreign('person_id')->references('id')->on('person');
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
        Schema::dropIfExists('media_crew');
    }
}
