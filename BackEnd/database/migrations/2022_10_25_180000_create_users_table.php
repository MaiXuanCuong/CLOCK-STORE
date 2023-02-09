<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('birthday');
            $table->string('image');
            $table->string('gender');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts');
            $table->unsignedBigInteger('ward_id');
            $table->foreign('ward_id')
                ->references('id')
                ->on('wards');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
