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
            $table->unsignedBigInteger('parent')->default(0); //parent post id si yazılacak
            $table->string('image')->nullable(); //post veya sayfa ise öne çıkan görsel url'si , media ise kayıt url'si
            $table->string('title')->nullable(); //media için orjinal adı
            $table->longText('content')->nullable();  //media için alt etiketi
            $table->string('post_status')->default('publish'); //publish, draft, revision
            $table->string('type')->default('post');
            $table->integer('order')->default(0);
            $table->string('comment_status')->default('open'); //open, status
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
