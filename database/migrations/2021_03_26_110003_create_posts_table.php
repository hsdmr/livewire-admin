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
            $table->id();
            $table->unsignedBigInteger('slug_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('post_id')->default(0);
            $table->unsignedBigInteger('parent')->default(0);
            $table->string('image')->default('');
            $table->string('title')->default('');
            $table->longText('content')->default('');
            $table->string('post_status')->default('publish');
            $table->string('type')->default('post');
            $table->integer('order')->default(0);
            $table->string('comment_status')->default('open');
            $table->integer('comment_count')->default(0);
            $table->string('language')->default('');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
