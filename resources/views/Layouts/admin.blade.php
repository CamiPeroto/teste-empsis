<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Teste - Empsis</title>
</head>

<body class="bg-body">
    <nav class="navbar">
        <div class="navbar-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="navbar-logo">
            
            <div class="relative w-40">
                <div class="search-input w-full px-1 py-1.5">
                  <input type="text" id="search-user"
                    class="dropdown-button w-full outline-none"
                    autocomplete="off"
                    placeholder="Buscar...">
                  <x-heroicon-o-magnifying-glass class="w-5 h-5 ml-2 text-white" />
                </div>
              
                <ul id="user-results"
                    class="absolute top-full mt-1 w-full z-50 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                </ul>
              </div>

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
