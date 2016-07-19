<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('files', function ( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name'); // 文件名
            $table->string('url'); // 文件url
            $table->string('thumbnail_url'); // 缩略图url
            $table->string('absolute_path'); // 文件绝对路径url
            $table->bigInteger('size'); // 文件大小
            $table->string('type', 20); // 文件类型 image/jpeg 例如: image,video,audio
//            $table->string('subtype', 20); // 子集 image/jpeg

            $table->string('title'); // 文件标题
            $table->string('desc'); // 文件描述

            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('files');

    }
}
