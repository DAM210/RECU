<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("titulo")</title>
    @vite("resources/css/app.css")
</head>
<body class="">
    @include("layouts.partials.nav")
    <div class="container">
        @yield("contenido")
    </div>
</body>
</html>

