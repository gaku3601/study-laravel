<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Bladeによるこんにちは</title>
</head>
	<body>
		<h1>こんにちは! Index!</h1>
        <a href="{{ route('examples.create') }}">データ作成</a>
        <p>DBに追加した内容</p>
        <div>
        @foreach ($data as $val)
            <div>{{ $val->id }}: {{ $val->name }}  <a href="{{ route('examples.show', ['example' => $val->id]) }}">詳細</a></div>
        @endforeach
        </div>
	</body>
</html>
