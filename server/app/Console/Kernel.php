<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * ここでコマンドを登録する
     *
     * @var array
     */
    protected $commands = [
        Commands\ExampleScheduler::Class,
    ];

    /**
     * ここでSchedulerの登録を行う
     * schedule方法は以下を参考
     * https://readouble.com/laravel/5.7/ja/scheduling.html
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 1分単位で実行
        $schedule->command('examplescheduler:info')
            ->cron('*/1 * * * *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
