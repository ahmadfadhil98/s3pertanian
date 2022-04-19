<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css'>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col h-screen w-full overflow-x-hidden">
            <header>
                <div>
                    @if (Auth::check())
                        @livewire('navigation-dropdown')
                    @else
                        <div class="flex w-full bg-gradient-to-r from-green-600 to-green-900 shadow-md px-6 py-7">
                    {{-- <div class="flex items-center">
                        <img href="{{ route('dashboard') }}">
                            <img src="{{url('/img/logo_unand.png')}}" width="64">
                        </a>
                    </div> --}}
                            <div class="flex-1 flex">
                                <div class="items-center">
                                    <img href="{{ route('dashboard') }}">
                                        <img src="{{url('/img/logo_unand.png')}}" width="40">
                                    </a>
                                </div>
                                <div class="flex-1 pt-2 pl-2 text-xl text-white hover:text-gray-100 font-bold pb-0.5">Sistem Informasi Disertasi Pertanian Universitas Andalas</div>
                            </div>
                            <div class="flex-none h-full">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                                @else
                                <button style="background-color: #078CAA;" wire:click="{{ route('login') }}" class="transform hover:scale-95 duration-300 rounded focus:outline-none py-1.5 px-3 text-base font-bold text-white shadow-md">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>Login</div>
                                    </div>
                                </button>
                                    {{-- <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Login</a> --}}

                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif --}}
                                @endauth
                            </div>
                        </div>
                    @endif

                </div>
            </header>
            <main class="relative flex-1 overflow-y-auto h-full bg-gray-100">
                <div class="min-h-full">
                    {{ $slot }}
                </div>

                <footer class="bg-gradient-to-r from-green-600 to-green-900 shadow-inner">
                <div class="text-xs text-gray-200 text-center py-3.5">
                    <div class="">Sistem Informasi Disertasi Pertanian</div>
                    <div class="">Universitas Andalas</div>
                </div>
            </footer>
            </main>
        </div>
        {{-- <div  class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->


            <!-- Page Content -->
            <main class="h-screen">
                {{ $slot }}
            </main>


        </div> --}}

        @stack('modals')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.min.js" integrity="sha512-K4UtqDEi6MR5oZo0YJieEqqsPMsrWa9rGDWMK2ygySdRQ+DtwmuBXAllehaopjKpbxrmXmeBo77vjA2ylTYhRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.js" integrity="sha512-eCQjXTTg9blbos6LwHpAHSEZode2HEduXmentxjV8+9pv3q1UwDU1bNu0qc2WpZZhltRMT9zgGl7EzuqnQY5yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js'></script> --}}
        @livewireScripts
    </body>
    {{-- <footer class="bg-gradient-to-r from-green-600 to-green-900 shadow-inner">
        <div class="text-xs text-gray-200 text-center py-3.5">
            <div class="">Sistem Informasi S3 Pertanian</div>
            <div class="">Universitas Andalas</div>
            </div>
        </div>
    </footer> --}}
</html>
