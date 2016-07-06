<?php

namespace App\Console\Commands;

use App\Model\Article;
use Illuminate\Console\Command;
use RedisManager;

class CountTagCategory extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermelon:count-tag-category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '统计博客标签和分类数量';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        RedisManager::command('DEL', [ 'watermelon_tag_count' ]);
        RedisManager::command('DEL', [ 'watermelon_category_count' ]);

        Article::chunk(300, function ( $articles ) {
            $tags = [ ];
            $categories = [ ];
            foreach ( $articles as $article ) {
                foreach ( json_decode($article->tags, true) as $tag ) {
                    $tags[] = $tag;
                }

                foreach ( json_decode($article->categories, true) as $category ) {
                    $categories[] = $category;
                }
            }

            foreach ( array_count_values($tags) as $tag => $num ) {
                RedisManager::command('HINCRBY', [ 'watermelon_tag_count', $tag, $num ]);
            }

            foreach ( array_count_values($categories) as $category => $num ) {
                RedisManager::command('HINCRBY', [ 'watermelon_category_count', $category, $num ]);
            }

        });

        $this->info(date('Y-m-d H:i:s') . ' 统计博客标签和分类数量成功.');
    }
}
