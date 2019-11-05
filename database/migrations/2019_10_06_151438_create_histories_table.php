<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('user_id')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->unsignedbigInteger('lapangan_id')->onDelete('cascade');
            $table->foreign('lapangan_id')
                ->references('id')
                ->on('lapangans')->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->date('tanggal_main');
            $table->time('waktu_mulai');
            $table->string('no_telp');            
            $table->integer('harga');
            $table->string('struk')->nullable();
            $table->enum('active', ['0', '1'])->nullable();
            ('struk')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
