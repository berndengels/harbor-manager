<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanDatesTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('caravan_id')->index('caravan_id');
            $table->date('from');
            $table->date('until');
            $table->unsignedTinyInteger('persons');
            $table->unsignedTinyInteger('electric')->nullable();
            $table->unsignedInteger('price');
            $table->longText('prices');
            $table->boolean('is_paid')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_dates');
    }
}
