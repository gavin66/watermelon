<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::table('articles',function(Blueprint $table){
//			$table->json('category_ids')->nullable();
//			$table->json('tag_ids')->nullable();
//		});

		Schema::create('articles', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('title'); // 文章标题
			$table->string('outline'); // 文章简介
			$table->string('status',20); // 文章简介
			$table->text('content_md'); // 文章内容(纯文字)
			$table->text('content_html'); // 文章内容(包含html代码)
			$table->json('categories')->nullable(); // 关联的分类ID
			$table->json('tags')->nullable(); // 关联的标签ID
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
		Schema::drop('articles');
	}

}
