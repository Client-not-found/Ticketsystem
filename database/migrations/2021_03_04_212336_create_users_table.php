<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('useKey');
            $table->unsignedBigInteger('useGroId');
            $table->string('useUsername');
            $table->string('usePassword');
            $table->string('useFirstname');
            $table->string('useLastname');
            $table->string('useStreet');
            $table->string('useZIP');
            $table->string('useCity');
            $table->string('useState');
            $table->string('useMail');
            $table->timestamps();
            $table->foreign('useGroId')->references('groKey')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
