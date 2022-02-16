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
                    <div class="flex-grow"></div>
                    <div class="flex-none h-full">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="focus:outline-none py-2.5 px-10 text-base text-white hover:text-gray-400 underline">Login</a>
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
                    <div class="">Sistem Informasi S3 Pertanian</div>
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
