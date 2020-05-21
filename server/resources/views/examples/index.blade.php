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
        function http(method, uri, json){
            ajax.open(method, uri);
            ajax.setRequestHeader("Content-Type", "application/json");
            ajax.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].content);
            ajax.send(JSON.stringify(json));
            ajax.onload = () => {
                console.log(ajax.status);
                console.log(ajax);
                console.log("success!");
            };
            ajax.onerror = () => {
                console.log(ajax.status);
                console.log("error!");
            };
        }
    </script>
</head>
	<body>
		<h1>こんにちは! Blade!</h1>
        <button onClick="http(Method.POST,'http://localhost/examples',{'test': 'request'})">click</button>
	</body>
</html>
