<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            // ここにカラムを追加していく

            $table->string('name');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('visit_status');
            $table->decimal('score', 2, 1);
            $table->text('impression');
            // $table->画像　空欄〇
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('visit_status_id')->references('id')->on('visit_statuses');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
