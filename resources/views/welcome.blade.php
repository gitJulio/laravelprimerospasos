<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <a href="/contacto">Contacto</a>
    <a href="{{Route('contacto')}}">Contacto con Name</a>
    <hr />
    {{$user->name}}
</body>
</html>
