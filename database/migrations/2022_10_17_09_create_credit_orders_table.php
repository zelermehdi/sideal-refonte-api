<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_orders', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->string('paiment_type');
            $table->boolean('is_paid')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('member_id')->unsigned();
            $table->unsignedBigInteger('credit_id')->unsigned();
        });
         Schema::table('credit_orders', function(Blueprint $table) {
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
        Schema::dropIfExists('credit_orders');
    }
}
