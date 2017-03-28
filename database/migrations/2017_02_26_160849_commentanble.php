<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Commentanble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function(Blueprint $table){
        $table->increments('id');
        $table->integer('post_id')->unsigned();
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        $table->string('name');
        $table->string('email');
        $table->longtext('comment');
        $table->integer('is_approved')->default(0);
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
        Schema::drop('comments');
    }
}
