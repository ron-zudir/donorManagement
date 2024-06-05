<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="p-10">
        <div class="text-center">
            <h1 class="text-5xl font-bold">OTS Donor Management</h1>
        </div-text-center>
    </div>
    @yield('content')
</body>
</html>