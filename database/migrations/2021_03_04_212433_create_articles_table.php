<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('artKey');
            $table->unsignedBigInteger('artUseId');
            $table->unsignedBigInteger('artCatId');
            $table->string('artTopic');
            $table->mediumtext('artMessage');
            $table->timestamps();
            $table->foreign('artUseId')->references('useKey')->on('users');
            $table->foreign('artCatId')->references('catKey')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
