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

        ol {
            list-style-type: decimal !important;
            padding-left: 20px !important;
        }

        ul {
            list-style-type: disc !important;
            padding-left: 20px !important;
        }

        /* Blog Posts */
        article h1 {
            line-height: 1.2 !important;
            font-size: 2rem !important;
            color: #424242 !important;
            font-weight: 900 !important;
            padding-bottom: 20px !important;
        }

        article h2 {
            line-height: 1.2 !important;
            font-size: 1.5rem !important;
            color: #424242 !important;
            font-weight: 800 !important;
            padding-bottom: 10px !important;
        }

        article h3 {
            line-height: 1.2 !important;
            font-size: 1.25rem !important;
            color: #424242 !important;
            font-weight: 700 !important;
            padding-bottom: 10px !important;
        }

        article h4 {
            line-height: 1.2 !important;
            font-size: 1.2rem !important;
            color: #424242 !important;
            font-weight: 600 !important;
            padding-bottom: 10px !important;
        }

        article p {
            line-height: 1.75 !important;
            letter-spacing: .2px !important;
            font-size: 1rem !important;
            color: #424242 !important;
            font-weight: 400 !important;
            margin-bottom: 1rem !important;
        }

        article ul {
            line-height: 1.7 !important;
            padding-bottom: 5px !important;
        }

        article table {
            margin-top: 2rem !important;
            margin-bottom: 2rem !important;
            border-radius: 10px !important;
        }

        article table,
        article table td,
        article table th {
            border: 1px solid #ccc !important;
            padding: 5px 10px !important;
        }

    </style>
    @vite('resources/css/app.css')
</head>
