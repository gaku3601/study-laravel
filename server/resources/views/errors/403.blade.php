<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>403Error</title>
</head>
<body>
<h1>403 Error</h1>
<h2>{{$message}}</h2>
</body>
</html>
