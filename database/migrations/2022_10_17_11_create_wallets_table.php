<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->timestamps();
            $table->unsignedBigInteger('member_id')->unsigned();
            $table->unsignedBigInteger('credit_id')->unsigned();
        });

         Schema::table('wallets', function(Blueprint $table) {
             $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::dropIfExists('wallets');
    }
}
