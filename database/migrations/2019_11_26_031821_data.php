<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->bigIncrements('id_pemohon');
            $table->string('kd_user', 15);
            $table->string('nip', 25);
            $table->text('ava')->nullable();
            $table->string('nama', 255);
            $table->string('jk', 5);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('agama', 10);
            $table->string('status', 10);
            $table->string('unit_kerja', 255);
            $table->string('jabatan', 100);
            $table->string('pangkat', 50);
            $table->string('jenjang_pend', 5);
            $table->string('jurusan', 100);
            $table->string('univ', 100);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('beasiswa', 100)->nullable();
            $table->string('alasan_perp', 100);
            $table->integer('jml_wkt_perp')->nullable();
            $table->date('tgl_perp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('berkas_pemohon', function (Blueprint $table) {
            $table->bigIncrements('id_berkas');
            $table->integer('id_pemohon');
            $table->text('surat_alasan_perpanjangan')->nullable();
            $table->text('surat_keterangan_sehat')->nullable();
            $table->text('sk_cpns_pns')->nullable();
            $table->text('sk_jabatan_terakhir')->nullable();
            $table->text('sk_lulus')->nullable();
            $table->text('jam_pem_belajar')->nullable();
            $table->text('rek_per_studi')->nullable();
            $table->text('surat_set_per_pen_studi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('verifikasi_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_berkas');
            $table->integer('id_user');
            $table->integer('id_status');
            $table->text('keterangan')->nullable();
            $table->integer('no_surat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('validasi_verifikasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_surat');
            $table->date('tgl_validasi')->nullable();
            $table->integer('id_verifikasi');
            $table->integer('id_user');
            $table->text('surat_izin_belajar')->nullable();
            $table->text('izin_dinas_perpanjangan')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tracking_verifikasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_berkas');
            $table->text('id_status');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id_status');
            $table->string('status', 255);
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
        Schema::dropIfExists('pemohon');
        Schema::dropIfExists('berkas_pemohon');
        Schema::dropIfExists('verifikasi_data');
        Schema::dropIfExists('validasi_verifikasi');
        Schema::dropIfExists('status');
    }
}
