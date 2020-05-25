<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExampleScheduler extends Command
{
    /**
     * ここにcommandの名前を記載。呼び出し時に利用する
     *
     * @var string
     */
    protected $signature = 'examplescheduler:info';

    /**
     * コマンドの説明を記載
     *
     * @var string
     */
    protected $description = 'Schedulerサンプルコマンド';

    /**
     * インスタンス生成
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 実行するコマンドの内容を記載
     *
     * @return mixed
     */
    public function handle()
    {
        logger("ExampleSchedulerの実行");
    }
}
