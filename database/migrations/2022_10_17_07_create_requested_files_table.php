<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('message');
            $table->boolean('is_validated')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('file_id')->nullable();
        });


        Schema::table('requested_files', function(Blueprint $table) {
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
     });

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requested_files');
    }
}
