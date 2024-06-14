<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
                $table->string('activity_id',16)->primary();
                $table->time('activity_time');
                $table->date('activity_date');
                $table->string('activity_name');
                $table->integer('activity_notification')->default(1);
                $table->unsignedBigInteger('activity_user_id');
                $table->timestamps();
                $table->foreign('activity_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
