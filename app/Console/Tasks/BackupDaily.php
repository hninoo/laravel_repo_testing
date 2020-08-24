<?php

namespace App\Console\Tasks;

use Signifly\SchedulingTasks\TaskContract;
use Illuminate\Console\Scheduling\Schedule;

class BackupDaily implements TaskContract
{
    public function __invoke(Schedule $schedule)
    {
        $schedule->command('backup:run')->everyMinute()->sendOutputTo(storage_path('logs/laravel.log'));
    }
}