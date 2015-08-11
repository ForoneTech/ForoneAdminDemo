<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articals', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->text('content');
            $table->integer('tag_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('artist_id')->unsigned()->nullable();
            $table->integer('admin_id')->unsigned()->nullable(); //操作人ID

            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::drop('articals');
    }
}
