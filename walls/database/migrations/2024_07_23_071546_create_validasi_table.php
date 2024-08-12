<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validasi', function (Blueprint $table) {
            $table->id('id_validation'); // Bigint auto-increment primary key
            $table->bigInteger('userid')->unsigned(); // Unsigned big integer for user ID
            $table->integer('id_percobaan'); // Integer for percobaan ID
            $table->bigInteger('id_submit')->unsigned(); // Unsigned big integer for submit ID
            $table->string('status'); // Varchar for status
            $table->integer('time')->nullable(); // Integer for time, nullable
            $table->text('report'); // Text field for report
            $table->string('file_submitted', 70); // Varchar for file_submitted with length of 70
            $table->timestamps(); // Creates created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validasi');
    }
}
