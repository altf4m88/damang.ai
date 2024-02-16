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