<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Bladeによるこんにちは</title>
    <script src="{{ asset('/js/ajax.js') }}"></script>
</head>
	<body>
		<h1>こんにちは! Blade!</h1>
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" size="30" maxlength="20" />
        </div>
        <button onClick="
        http(
            METHOD.POST,
            'http://localhost/examples',
            {
                'test': document.getElementById('name').value
            },
            function(e) { document.getElementById('name').value = ''; },
            function(e) { console.log(e); }
        )">click</button>
	</body>
</html>
