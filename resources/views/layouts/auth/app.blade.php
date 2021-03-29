<!DOCTYPE html>
<html lang="{{App::currentLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login / Register</title>
    @include('layouts.admin.header')
    @livewireStyles
</head>
<body style="background-color: #d5d5d5">
    {{$slot}}
    @livewireScripts
</body>
</html>
