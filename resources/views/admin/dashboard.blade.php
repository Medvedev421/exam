<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
</head>
<body>

<h1>Админская панель</h1>

<p>Вы вошли как администратор: {{ auth()->user()->name }}</p>

<a href="{{ route('dashboard') }}">Назад на dashboard</a>

</body>
</html>
