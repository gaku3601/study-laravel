<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Bladeによるこんにちは</title>
    <script>
        const Method = {
            POST: "post",
            GET: "get",
            DELETE: "delete",
            PATCH: "patch"
        }
        var ajax = new XMLHttpRequest();
        ajax.responseType = 'json';
        function http(method, uri, json, success, error){
            ajax.open(method, uri);
            ajax.setRequestHeader("Content-Type", "application/json");
            ajax.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].content);
            ajax.send(JSON.stringify(json));
            ajax.onload = () => {
                success(ajax);
            };
            ajax.onerror = () => {
                error(ajax)
            };
        }
    </script>
</head>
	<body>
		<h1>こんにちは! Blade!</h1>
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" size="30" maxlength="20" />
        </div>
        <button onClick="
        http(
            Method.POST,
            'http://localhost/examples',
            {
                'test': document.getElementById('name').value
            },
            function(e) { console.log(e); },
            function(e) { console.log(e); }
        )">click</button>
	</body>
</html>
