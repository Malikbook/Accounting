<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('year_id')->unsigned()->default(1);
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('month_id')->unsigned()->default(1);
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('day_id')->unsigned()->default(1);
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->float('cost_amount', 10,2);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('cos');
    }
}
