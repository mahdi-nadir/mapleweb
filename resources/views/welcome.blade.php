<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <script differ src="https://kit.fontawesome.com/918ba06b86.js" crossorigin="anonymous"></script>
        <title>maple mind</title>
    </head>
    <body class="bodyLanding">
        <div class="landingPage">
            <span id="maplemind">Maple Mind</span><br><span id="encyclopedie">L'encyclopédie <br>de l'immigration <br>au <span class="rouge">Ca</span><span>na</span><span class="rouge">da</span></span>
            @if (Route::has('login'))
                <div >
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Créer un compte</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        
            
    </body>
</html>
