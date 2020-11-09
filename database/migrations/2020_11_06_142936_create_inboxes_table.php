<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chat_id')->unsigned();
            $table->string('pesan');
            $table->enum('status', ['0', '1']); //1 untuk terbaca . . 0 untuk belum
            $table->enum('from', ['0', '1']); //1 untuk admin . . 0 untuk user
            $table->integer('reply_by')->nullable(); //relasi table users
            $table->foreign('chat_id')->references('id')->on('telegram_users')->onDelete('cascade');
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
        Schema::dropIfExists('inboxes');
    }
}
