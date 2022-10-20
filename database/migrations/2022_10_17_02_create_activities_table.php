<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_title');
            $table->string('color');
            $table->integer('slots')->default('0');
            $table->boolean('require_approval')->default('1');
            $table->boolean('adult_only')->nullable();
            $table->boolean('kid_only')->nullable();
            $table->float('adult_sideal_value');
            $table->float('adult_out_sideal_value');
            $table->float('kid_sideal_value');
            $table->float('kid_out_sideal_value');
            $table->string('day');
            $table->time('starts_at');
            $table->time('ends_at');
            $table->timestamps();
            $table->unsignedBigInteger('credit_id');
        });

        Schema::table('activities', function(Blueprint $table) {
            $table->foreign('credit_id')->references('id')->on('credits')->onDelete('cascade');
         });
      

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
