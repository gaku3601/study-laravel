<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bladeによるこんにちは</title>
    <script src="{{asset('/js/ajax.js')}}"></script>
</head>
<body>
<h1>データの編集</h1>
<div>
    <label for="name">名前</label>
    <input type="text" name="name" id="name" size="30" maxlength="20" value="{{$data->name}}" />
</div>
<button onClick="
        http(
            METHOD.POST,
            'http://localhost/examples/{{$id}}',
            {
                'test': document.getElementById('name').value,
                'version': {{$data->version}},
                '_method': 'PATCH'
            },
            function(e) { console.log(e);location.href = '{{ route("examples.show", ["example" => $id]) }}'; },
            function(e) { alert(e) }
            )">保存</button>
<div>{{$data->version}}</div>
</body>
</html>
