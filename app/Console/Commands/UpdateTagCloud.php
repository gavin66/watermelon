<?php

namespace App\Console\Commands;

use App\Model\Article;
use Illuminate\Console\Command;

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
    protected $description = 'update blog tag'; // 更新博客标签云

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
        //
//        $time = time();
//        $tag = '["Model S"]';
//        $tag = '["'.$time.'"]';
//
//        Article::where('id','5')->update(['tags'=>$tag]);
//        Article::update(['tags'=>'["Model S"]']);

        \RedisManager::command('set',['test','jjjj']);

        $this->info('成功了');
    }
}
