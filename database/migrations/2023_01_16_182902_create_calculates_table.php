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
        Schema::create('calculates', function (Blueprint $table) {
            $table->id();
            $table->json('calculate')->nullable(true);
            $table->timestamps();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('member_id');
            $table->foreign('group_id')->references('group_id')->on('groups');
            $table->foreign('member_id')->references('member_id')->on('members');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculates');
    }
};
