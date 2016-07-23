<?php

use Illuminate\Database\Seeder;
use App\Model\Article;

class AboutMeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        if ( Article::where('id',1)->count() == 0 ) {

            Article::create([
                'title'        => '关于我',
                'status'       => '发布',
                'content_md'   => '介绍一下自己吧...',
                'content_html' => '<p>介绍一下自己吧…</p>',
                'categories'    => '[]',
                'tags'         => '[]',

            ]);

        }


    }
}
