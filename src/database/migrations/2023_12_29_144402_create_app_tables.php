<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_statuses', function (Blueprint $table) {
            $table->id();
            // ここにカラムを追加していく
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            // ここにカラムを追加していく
            $table->timestamps();
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            // ここにカラムを追加していく
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('visit_status_id')->constrained('visit_statuses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_statuses');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('logs');
    }
}
