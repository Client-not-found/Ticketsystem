<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id('mesKey');
            $table->unsignedBigInteger('mesTicId');
            $table->unsignedBigInteger('mesUseId');
            $table->mediumtext('mesMessage');
            $table->timestamps();
            $table->foreign('mesTicId')->references('ticKey')->on('tickets');
            $table->foreign('mesUseId')->references('useKey')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
