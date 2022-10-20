<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamps();
            $table->unsignedBigInteger('member_id')->unsigned();
            $table->unsignedBigInteger('session_id')->unsigned();
        });


         Schema::table('my_bookings', function(Blueprint $table) {
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_bookings');
    }
}
