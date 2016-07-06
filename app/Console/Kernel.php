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
//         Commands\Inspire::class,
        Commands\CountTagCategory::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule( Schedule $schedule ) {
        // $schedule->command('inspire')
        //          ->hourly();

        // 更新标签
        $schedule->command('watermelon:count-tag-category')
                 ->everyFiveMinutes()
                 ->withoutOverlapping()
                 ->appendOutputTo(config('watermelon.console_count_tag_category_log'));


    }
}

