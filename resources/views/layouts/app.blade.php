<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'BorrowBox')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</head>
<body>
    <div class="max-w-400 mx-auto">
        <div class="flex min-h-screen">
            @include('partials.admin.sidebar')

            <div class="flex-1 flex flex-col">

                @include('partials.admin.navbar')

                <main class="flex-1 p-6 lg:p-8">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>