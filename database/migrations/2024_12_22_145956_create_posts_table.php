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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('konten');
            $table->text('deskripsi');
            $table->text('isi_deskripsi');
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('KategoriID');
            $table->timestamps();

            // Foreign keys
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('KategoriID')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['UserID']);
            $table->dropForeign(['KategoriID']);
        });

        Schema::dropIfExists('posts');
    }
};
