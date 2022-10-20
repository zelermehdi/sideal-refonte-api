<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link')->nullable();
            $table->string('file_type')->nullable();
            $table->boolean('is_validated')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('member_id')->unsigned();
        });

         Schema::table('files', function(Blueprint $table) {
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
        Schema::dropIfExists('files');
    }
}
