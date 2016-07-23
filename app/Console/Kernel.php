<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\Inspire::class,
//        Commands\CountTagCategory::class,
//        Commands\DatabaseBackup::class,
//        Commands\BuildRedisData::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule( Schedule $schedule ) {
         $schedule->command('inspire')
                  ->everyMinute();

        // 更新标签的 redis 数据
//        $schedule->command('watermelon:build-redis-data tags')
//            ->hourly()
//            ->withoutOverlapping()
//            ->appendOutputTo(config('watermelon.schedule_log'));

        // 更新分类的 redis 数据
//        $schedule->command('watermelon:build-redis-data  categories')
//            ->hourly()
//            ->withoutOverlapping()
//            ->appendOutputTo(config('watermelon.schedule_log'));

        // 更新标签分类数量的 redis 数据
//        $schedule->command('watermelon:count-tag-category')
//            ->everyFiveMinutes()
//            ->withoutOverlapping()
//            ->appendOutputTo(config('watermelon.schedule_log'));

        // 数据库备份
//        $schedule->command('watermelon:database-backup')
//            ->daily()
//            ->withoutOverlapping()
//            ->appendOutputTo(config('watermelon.schedule_log'));



    }
}

