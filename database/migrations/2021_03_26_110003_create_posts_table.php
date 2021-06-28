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
            $table->unsignedBigInteger('parent')->default(0); //paren post_id
            $table->string('image')->nullable(); //use featured image url for post or page, store url for media
            $table->string('title')->nullable(); //use as an original name for media
            $table->longText('content')->nullable();  //use as an alt tag for media
            $table->string('post_status')->default('publish'); //publish, draft, revision
            $table->string('type')->default('post');
            $table->integer('order')->default(0);
            $table->string('comment_status')->default('open'); //open, close
            $table->integer('comment_count')->default(0);
            $table->string('language')->nullable();
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
