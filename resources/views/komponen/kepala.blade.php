<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="{{ asset('lineone/images/favicon.png') }}" />
    <script src="{{asset('lineone/js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('lineone/css/app.css')}}" />
    <script>
        localStorage.getItem("_x_darkMode_on") === "true" && document.documentElement.classList.add("dark");

    </script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }

        @media only screen and (min-width: 1024px) {
            .main-content {
                margin-top: 55px !important;
            }
        }

        @media only screen and (min-width: 640px) and (max-width: 1023px) {
            .main-content {
                margin-top: 90px !important;
            }
        }
    </style>

    @vite('resources/css/app.css')

    @livewireStyles
</head>
