<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/js/app.js')
{{--    <script type="module">--}}
{{--        $(document).ready(function(){--}}
{{--            alert('hiiiiiiii');--}}
{{--        });--}}
{{--    </script>--}}
</head>
<body>
<div id="app">
    <section class="px-12 py-4 mb-6">
        <header class="container mx-auto">
            <h1>
                <img src="/images/logo.svg"
                     alt="Tweety"
                />
            </h1>
        </header>
    </section>
    {{$slot}}
</div>
</body>
</html>
