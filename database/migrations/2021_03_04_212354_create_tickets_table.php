<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticKey');
            $table->unsignedBigInteger('ticUseId');
            $table->unsignedBigInteger('ticDepId');
            $table->string('ticSubject');
            $table->string('ticStatus');
            $table->timestamps();
            $table->foreign('ticUseId')->references('useKey')->on('users');
            //$table->foreign('ticDepId')->references('depKey')->on('departements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
