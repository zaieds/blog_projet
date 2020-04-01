<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->timestamp('post_date')->nullable();
            $table->text('post_content');
            $table->text('post_title');
            $table->string('post_status')->nullable();
            $table->string('post_name');
            $table->string('post_type');
            $table->text('post_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
//on mettra le code de suppression
    {
        Schema::dropIfExists('posts');
    }
}
