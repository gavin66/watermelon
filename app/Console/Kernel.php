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
        Commands\UpdateTagCloud::class
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

        $schedule->command('watermelon:update-tag-cloud')->everyFiveMinutes()->withoutOverlapping()->appendOutputTo('/var/www/github/logs');
    }
}

// * * * * * php /var/www/github/watermelon/artisan schedule:run 1>> /dev/null 2>&1