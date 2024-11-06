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
        Schema::create('hardware_l', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key
            $table->string('unit');
            $table->string('inventaris');
            $table->string('user');
            $table->date('tanggal_rencana');
            $table->date('tanggal_relasasi');
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
        Schema::dropIfExists('hardware_l');
    }
};
