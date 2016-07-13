<?php

namespace App\Console\Commands;

use App\Model\Category;
use App\Model\Tag;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BuildRedisData extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermelon:build-redis-data {argument}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成 redis 数据';

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
        $argument = $this->argument('argument');

        if ( $argument == 'tags' ) {
            $arr = [ ];

            Tag::chunk(500, function ( $tags ) use ( &$arr ) {
                foreach ( $tags as $tag ) {
                    $arr[] = $tag->name;
                }
            });

            \RedisManager::command('SET',['watermelon_tags',json_encode(array_unique($arr))]);

            $this->info(Carbon::now()->toDateTimeString() . ' watermelon:build-redis-data tags 生成标签的 redis 数据成功.');
        } else if ( $argument == 'categories' ) {
            $arr = [ ];

            Category::chunk(500, function ( $categories ) use ( &$arr ) {
                foreach ( $categories as $category ) {
                    $arr[] = $category->name;
                }
            });

            \RedisManager::command('SET',['watermelon_categories',json_encode(array_unique($arr))]);

            $this->info(Carbon::now()->toDateTimeString() . ' watermelon:build-redis-data categories 生成分类的 redis 数据成功.');

        }else{

            $this->info('参数不正确.');

        }

    }
}
