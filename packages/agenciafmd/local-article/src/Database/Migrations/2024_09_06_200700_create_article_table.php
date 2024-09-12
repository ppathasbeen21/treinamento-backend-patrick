<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')
                ->default(1);
            $table->boolean('star')
                ->default(0);
            $table->string('name');
            $table->text('description')
                ->nullable();
            $table->string('slug');
            $table->integer('sort')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article');
    }
}
