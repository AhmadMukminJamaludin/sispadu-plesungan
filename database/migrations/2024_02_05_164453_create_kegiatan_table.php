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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_kegiatan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->enum('kategori', ['Berita Kelurahan', 'Program Sosial', 'Pelayanan Publik', 'Kesehatan dan Lingkungan', 'Pendidikan', 'Kegiatan Komunitas', 'Keamanan dan Ketertiban', 'Pariwisata Lokal', 'Partisipasi Masyarakat', 'Ketenagakerjaan dan Ekonomi'])->nullable();
            $table->enum('status', ['Diterbitkan', 'Diarsipkan'])->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
};
