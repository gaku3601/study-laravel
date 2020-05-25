### [step3] Laravelでのスケジューラー実行
#### コマンドの生成
以下を実行しコマンドを生成することで、server/app/Console/CommandsフォルダにCommandファイルが生成される。  

```
docker-compose exec php php artisan make:command ExampleScheduler
```

#### コマンドの登録
server/app/Console/Kernel.phpに作成したコマンドを登録する
```
protected $commands = [
    Commands\ExampleScheduler::Class, // 登録
];
```

#### コマンドの確認
作成したコマンドのリストを以下コマンドで確認できます
```
docker-compose exec php php artisan list
```

#### コマンドの実行
Schedulerを利用しない場合、以下を実行することでコマンドを手動起動可能。
```
php artisan examplescheduler:info
```

#### コマンドの定期実行[初期設定]
定期実行を実現するためにはcrontabに以下を記載しておく必要がある
```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

#### コマンドの定期実行
server/app/Console/Kernel.phpのschedulerメソッドを変更することで実現する
```
protected function schedule(Schedule $schedule)
{
    // 1分単位で実行
    $schedule->command('examplescheduler:info')
        ->cron('*/1 * * * *');
}
```

詳細な時間指定は以下資料を参考のこと  
https://readouble.com/laravel/5.7/ja/scheduling.html

