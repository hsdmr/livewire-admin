<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slug_id')->default(0);
            $table->unsignedBigInteger('parent')->default(0);
            $table->string('image')->default('');
            $table->string('title')->default('');
            $table->longText('content')->default('');
            $table->string('type')->default('post');
            $table->integer('count')->default(0);
            $table->string('language')->default('');
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
        Schema::dropIfExists('categories');
    }
}
