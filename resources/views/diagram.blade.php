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
                    <div class="h-full flex justify-center py-8 md:px-4 mx-16 mb-10">
                <div class="w-11/12 lg:w-2/3">
                    <div class="w-full bg-gray-800 text-gray-500 rounded shadow-xl py-5 px-5 w-full" x-data="{chartData:chartData()}" x-init="chartData.fetch()">
                        <div class="flex flex-wrap items-end">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold leading-tight">Jumlah Mahasiswa</h3>
                            </div>
                            <div class="relative" @click.away="chartData.showDropdown=false">
                                <button class="text-xs hover:text-gray-300 h-6 focus:outline-none" @click="chartData.showDropdown=!chartData.showDropdown">
                                    <span x-text="chartData.options[chartData.selectedOption].label"></span><i class="ml-1 mdi mdi-chevron-down"></i>
                                </button>
                                <div class="bg-gray-700 shadow-lg rounded text-sm absolute top-auto right-0 min-w-full w-32 z-30 mt-1 -mr-3" x-show="chartData.showDropdown" style="display: none;" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                                    <span class="absolute top-0 right-0 w-3 h-3 bg-gray-700 transform rotate-45 -mt-1 mr-3"></span>
                                    <div class="bg-gray-700 rounded w-full relative z-10 py-1">
                                        <ul class="list-reset text-xs">
                                            <template x-for="(item,index) in chartData.options">
                                                <li class="px-4 py-2 hover:bg-gray-600 hover:text-white transition-colors duration-100 cursor-pointer" :class="{'text-white':index==chartData.selectedOption}" @click="chartData.selectOption(index);chartData.showDropdown=false">
                                                    <span x-text="item.label"></span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-end mb-5">
                            <h4 class="text-2xl lg:text-3xl text-white font-semibold leading-tight inline-block mr-2" x-text="(chartData.data?chartData.data[chartData.date].jumlah.comma_formatter():0)+' orang'">0</h4>
                            {{-- <span class="inline-block" :class="chartData.data&&chartData.data[chartData.date].upDown<0?'text-red-500':'text-green-500'"><span x-text="chartData.data&&chartData.data[chartData.date].upDown<0?'▼':'▲'">0</span> <span x-text="chartData.data?chartData.data[chartData.date].upDown:0">0</span>%</span> --}}
                        </div>
                        <div>
                            <canvas id="chart" class="w-full"></canvas>
                        </div>
                    </div>

                </div>
            </div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.min.js" integrity="sha512-K4UtqDEi6MR5oZo0YJieEqqsPMsrWa9rGDWMK2ygySdRQ+DtwmuBXAllehaopjKpbxrmXmeBo77vjA2ylTYhRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.js" integrity="sha512-eCQjXTTg9blbos6LwHpAHSEZode2HEduXmentxjV8+9pv3q1UwDU1bNu0qc2WpZZhltRMT9zgGl7EzuqnQY5yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
