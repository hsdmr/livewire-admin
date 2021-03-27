<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('auth.Login')}}</title>
    @include('admin.layouts.header')
    @livewireStyles
</head>
<body style="background-color:#d5d5d5">
    <livewire:auth.login />
    @livewireScripts
</body>
</html>
