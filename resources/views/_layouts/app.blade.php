<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Damang.ai - Solusi untuk kesehatan anda</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <style>
          .dot-loader {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dot {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: #333; /* Change the color as needed */
            border-radius: 50%;
            animation: dotLoading 2s infinite ease-in-out both;
        }

        .dot:nth-child(1) { animation-delay: -0.32s; }
        .dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes dotLoading {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1.0); }
        }
        </style>

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
              theme: {
                extend: {
                  colors: {
                    primary: '#34cc9c',
                    darker: '#2fb88c',
                    background: '#48d1a6',
                  }
                }
              }
            }
          </script>
    @yield('script')

    </head>
    <body>
        @yield('content')
    </body>
    
</html>