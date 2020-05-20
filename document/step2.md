### [step2] CRUD

#### Controllerの作成
以下のコマンドでControllerを作成する

```
[Controllerを作成するコマンド(--resourceをつけることで、以下のようなrestなコードを生成できる)]
docker-compose exec php php artisan make:controller ExampleController --resource
```

```
[生成されるファイル]
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
```

### routingの設定
routes/web.php内に以下のように記載
```
Route::resource('examples', 'ExampleController');
```

ルーティングを確認するには以下のコマンドを実行
```
docker-compose exec php php artisan route:list
[output]
+--------+-----------+-------------------------+------------------+------------------------------------------------+--------------+
| Domain | Method    | URI                     | Name             | Action                                         | Middleware   |
+--------+-----------+-------------------------+------------------+------------------------------------------------+--------------+
|        | GET|HEAD  | /                       |                  | Closure                                        | web          |
|        | GET|HEAD  | api/user                |                  | Closure                                        | api,auth:api |
|        | GET|HEAD  | examples                | examples.index   | App\Http\Controllers\ExampleController@index   | web          |
|        | POST      | examples                | examples.store   | App\Http\Controllers\ExampleController@store   | web          |
|        | GET|HEAD  | examples/create         | examples.create  | App\Http\Controllers\ExampleController@create  | web          |
|        | GET|HEAD  | examples/{example}      | examples.show    | App\Http\Controllers\ExampleController@show    | web          |
|        | PUT|PATCH | examples/{example}      | examples.update  | App\Http\Controllers\ExampleController@update  | web          |
|        | DELETE    | examples/{example}      | examples.destroy | App\Http\Controllers\ExampleController@destroy | web          |
|        | GET|HEAD  | examples/{example}/edit | examples.edit    | App\Http\Controllers\ExampleController@edit    | web          |
+--------+-----------+-------------------------+------------------+------------------------------------------------+--------------+
```

### viewの作成
resources/viewsにファイルを[ファイル名].blade.phpのように作成する。
```
[resources/views/examples.blade.php]
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Bladeによるこんにちは</title>
</head>
	<body>
		<h1>こんにちは! Blade!</h1>
	</body>
</html>
```

controllerのindexで以下のように記載
```
・・・
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('examples');
    }
・・・
```
これで /examples にブラウザ等でアクセスすると指定のviewが表示される

### modelの作成
以下コマンドでコマンドを作成可能
```
[-mをつけることでmigrationも作成してくれる]
docker-compose exec php php artisan make:model example -m
```
app配下にmodelが生成される。tableと紐付けるため、以下のように修正
```
class example extends Model
{
    // 対応するテーブルを記載
    protected $table = 'examples';
    // 主キーの指定
    protected $primaryKey = 'id';
    // created_atとupdated_atの自動更新をONにする
    public $timestamps = true;
}
```

#### migrationの作成
database/migrations配下にmigrationが生成されるので、以下のように修正
```
class CreateExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examples');
    }
}
```
修正が終わったら、以下のコマンドを実行することで、tableに反映可能
```
docker-compose exec php php artisan migrate
```

