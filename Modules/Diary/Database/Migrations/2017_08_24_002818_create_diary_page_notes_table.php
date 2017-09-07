<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaryPageNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_page_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diary_page_id')->unsigned();
            $table->foreign('diary_page_id')
                ->references('id')
                ->on('diary_pages')
                ->onDelete('cascade');
            $table->morphs('noteable');
            $table->text('data')->nullable();
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
        Schema::dropIfExists('diary_page_notes');
    }
}
