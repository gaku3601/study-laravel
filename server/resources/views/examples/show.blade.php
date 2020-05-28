<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bladeによるこんにちは</title>
    <script src="{{asset('/js/ajax.js')}}"></script>
</head>
<body>
<h1>データ詳細</h1>
<div>id: {{ $data->id}}, name: {{ $data->name }}</div>
<a href="{{ route('examples.edit', ['example' => $data->id]) }}">編集</a>
<button onClick="
        http(
            METHOD.POST,
            'http://localhost/examples/{{$id}}',
            {
                '_method': 'DELETE'
            },
            function(e) { console.log(e);location.href = '{{ route("examples.index") }}'; },
function(e) { console.log(e); }
)">削除</button>
</body>
</html>
