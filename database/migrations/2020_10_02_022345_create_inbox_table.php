<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxTable extends Migration
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
            // $table->string('update_id')->nullable;
            $table->integer('chat_id');
            $table->string('nama_kontak');
            $table->string('pesan');
            $table->enum('status', ['0', '1']); //1 untuk terbaca . . 0 untuk belum
            $table->enum('from', ['0', '1']); //1 untuk admin . . 0 untuk user
            $table->integer('reply_by')->nullable(); //relasi table users
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
