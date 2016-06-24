<?php

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/4/17
 * Time: 12:03
 */
use App\Model\Article;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder{
    public function run() {
        DB::table('articles')->delete();

        for($i=0;$i<20;$i++){
            Article::create([
                'title'=>'标题标题'.$i,
                'content_md'=>'文章内容,文章内容'.$i,
                'content_html'=>'html内容'.$i
            ]);
        }

        $this->command->info('文章表填充数据完成!');
    }
}