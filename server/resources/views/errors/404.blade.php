<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404Error</title>
</head>
<body>
<h1>404 Error</h1>
<h2>{{$message}}</h2>
</body>
</html>
