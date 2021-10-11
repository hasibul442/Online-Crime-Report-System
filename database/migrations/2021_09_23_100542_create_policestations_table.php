<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policestations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('upazila_id');
            $table->unsignedInteger('user_id');

            
            $table->mediumText('address')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('policestations');
    }
}
