<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePercobaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percobaan', function (Blueprint $table) {
            $table->bigIncrements('id_percobaan');
            $table->smallInteger('id_topik');
            $table->string('no_percobaan');
            $table->string('nama_percobaan');
            $table->text('catatan')->nullable();
            $table->string('panduanpath');
            $table->string('filetest');
            $table->text('deskripsi');
            $table->longText('texteditor')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percobaan');
    }
}
