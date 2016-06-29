<?php

namespace App\Console\Commands;

use App\Model\Article;
use Illuminate\Console\Command;
use RedisManager;

class UpdateTagCloud extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermelon:update-tag-cloud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新博客标签云'; // 更新博客标签云

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

        RedisManager::command('DEL',['watermelon_tag_cloud']);

        Article::chunk(300,function($articles){
            $tags = [];
            foreach($articles as $article){
                foreach(json_decode($article->tags,true) as $tag) {
                    $tags[] = $tag;
                }
            }

            foreach( array_count_values($tags) as $tag=>$num ){
                RedisManager::command('HINCRBY',['watermelon_tag_cloud',$tag,$num]);
            }

        });

        $this->info(date('Y-m-d H:i:s').' 更新标签云成功!');
    }
}
