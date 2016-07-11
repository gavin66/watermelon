<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class DatabaseBackup extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermelon:database-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '备份当前数据库';

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
        $now = Carbon::now();
        $folder = $now->format('Y-m') . '/';
        $database = config('database.connections.mysql.database');
        $subfix = '_' . $now->toDateTimeString() . '.sql';

        $filename = $folder . $database . $subfix;

        $this->call('db:backup', [
            '--database'        => 'mysql',
            '--destination'     => 'dropbox',
            '--destinationPath' => $filename,
            '--compression'     => 'gzip',
        ]);
    }
}
