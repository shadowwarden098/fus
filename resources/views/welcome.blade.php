<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }
        a {
            margin: 10px 0;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <a href="{{ route('senin') }}">senin</a>
    <a href="{{ route('clan') }}">clan</a>
    <a href="{{ route('bienvenidos') }}">bienvenidos</a>
</body>
</html>
