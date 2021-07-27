<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- <style>
            body {
                font-family: 'Nunito';
            }
        </style> --}}
    </head>
    <body class="antialiased">
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"> --}}
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="flex items-center justify-center py-8 md:px-4">
                <div class="xl:w-1/3 flex flex-col 2xl:items-center">
                    <p tabindex="0" class="focus:outline-none text-base md:text-xl font-bold leading-tight text-gray-600 dark:text-gray-400 text-center">Total RSVP Count</p>
                    <div class="mx-auto flex flex-col items-center">
                        <div aria-label="pie chart" role="img" tabindex="0" class="focus:outline-none mt-8">
                            <canvas id="chartjs-2"></canvas>
                        </div>
                        <div class="mt-8">
                            <div class="flex items-center justify-between md:justify-start">
                                <div class="mr-8">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-400">Accepted</p>
                                    <p tabindex="0" class="focus:outline-none text-xl font-bold text-gray-700 dark:text-gray-400">73.6%</p>
                                </div>
                                <div class="pl-8 md:border-l border-gray-100 dark:border-gray-700">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-400">Rejected</p>
                                    <p tabindex="0" class="focus:outline-none text-xl font-bold text-gray-700 dark:text-gray-400">16.4%</p>
                                </div>
                            </div>
                            <div class="mt-3 flex items-center justify-between md:justify-start">
                                <div class="mr-8">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-400">Pending</p>
                                    <p tabindex="0" class="focus:outline-none text-xl font-bold text-gray-700 dark:text-gray-400">73.6%</p>
                                </div>
                                <div class="pl-8 md:border-l border-gray-100 dark:border-gray-700">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-400">Rejected</p>
                                    <p tabindex="0" class="focus:outline-none text-xl font-bold text-gray-700 dark:text-gray-400">16.4%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const myBarChart2 = new Chart(document.getElementById("chartjs-2"), {
                    type: "pie",
                    data: { labels: ["Accepted", "Rejected", "Pending", "Approved"], datasets: [{ data: [60, 12, 12, 25], fill: false, backgroundColor: [" #312E81", " #4338CA", " #4F46E5", " #4338CA"] }] },
                    options: {
                        legend: {
                            position: false,
                        },
                    },
                });
            </script>
        {{-- </div> --}}
    </body>
</html>
