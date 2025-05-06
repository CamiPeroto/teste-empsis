<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Teste - Empsis</title>
</head>

<body class="bg-body">
    <nav class="navbar">
        <div class="navbar-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="navbar-logo">
            <ul>
                <div class="search-input">
                    <li class="search-items"><x-heroicon-o-magnifying-glass class="w-5 h-5" />Pesquisar</li>
                </div>
            </ul>
        </div>
    </nav>
   
    <main class="main-content">
       
        @yield('content')
        
        <div class="content-box">
            
            @yield('content-box')
        
        </div>
    </main>

</body>

</html>
