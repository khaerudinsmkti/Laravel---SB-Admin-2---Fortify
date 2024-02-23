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
        Schema::create('komoditis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->bigInteger('beras_premium')->nullable();
            $table->bigInteger('beras_medium')->nullable();
            $table->bigInteger('kedelai')->nullable();
            $table->bigInteger('bawang_merah')->nullable();
            $table->bigInteger('bawang_putih');
            $table->bigInteger('cabai_merah_keriting')->nullable();
            $table->bigInteger('cabai_rawit_merah')->nullable();
            $table->bigInteger('daging_sapi')->nullable();
            $table->bigInteger('daging_ayam_ras')->nullable();
            $table->bigInteger('telur_ayam_ras')->nullable();
            $table->bigInteger('gula_konsumsi')->nullable();
            $table->bigInteger('minyak_goreng_kemasan')->nullable();
            $table->bigInteger('tepung_terigu_curah')->nullable();
            $table->bigInteger('minyak_goreng_curah')->nullable();
            $table->bigInteger('jagung_pipilan')->nullable();
            $table->bigInteger('ikan_kembung')->nullable();
            $table->bigInteger('ikan_tongkol')->nullable();
            $table->bigInteger('ikan_bandeng')->nullable();
            $table->bigInteger('garam')->nullable();
            $table->bigInteger('tepung_terigu_non_curah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komoditis');
    }
};
