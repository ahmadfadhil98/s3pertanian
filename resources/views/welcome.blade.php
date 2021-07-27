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
    <body class="antialiased h-screen">
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"> --}}
            @if (Route::has('login'))
                <div class="flex w-full bg-gradient-to-r from-green-600 to-green-900 shadow-md px-6 py-4">
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
                            <a href="{{ route('login') }}" class="focus:outline-none py-2.5 px-7 text-base text-white hover:text-gray-400">Login</a>
                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif --}}
                        @endauth
                    </div>
                </div>

            @endif

            <div class="h-full flex items-center justify-center py-8 md:px-4 mx-7">
                <div class="xl:w-1/3 flex flex-col 2xl:items-center">
                    <p tabindex="0" class="focus:outline-none text-base md:text-xl font-bold leading-tight text-gray-600 dark:text-gray-400 text-center">Bidang Ilmu: Perhitungan</p>
                    <div class="mx-auto flex flex-col items-center">
                        <div aria-label="pie chart" role="img" tabindex="0" class="focus:outline-none mt-8">
                            <canvas id="chartjs-2"></canvas>
                        </div>
                        <div class="mt-8">
                            <div class="flex items-center justify-between md:justify-start">
                                <div class="grid grid-cols-3 gap-4">
                                    @foreach ($topics as $topic)
                                    <div class="mr-8">
                                        <p tabindex="0" class="focus:outline-none text-xs text-gray-400">
                                            {{$topic->name}}
                                        </p>
                                        <p tabindex="0" class="focus:outline-none text-xl font-bold text-gray-700 dark:text-gray-400">73.6%</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-11/12 lg:w-2/3">
                    <div class="flex flex-col justify-between h-full">
                        <div>
                            <div class="w-full justify-between">
                                <h3 class="text-gray-600 dark:text-gray-400 leading-5 text-base md:text-xl font-bold mb-3">Jumlah Mahasiswa</h3>
                                <div class="flex items-center justify-between lg:justify-start mt-2 md:mt-4 lg:mt-0">
                                    <div class="flex items-center">
                                        <button class="py-2 px-4 bg-gray-100 dark:bg-gray-700 rounded ease-in duration-150 text-xs text-gray-600 dark:text-gray-400 hover:bg-gray-200">Masuk</button>
                                        <button class="py-2 px-4 bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 rounded text-white ease-in duration-150 text-xs hover:bg-indigo-600">Wisuda</button>
                                    </div>
                                    {{-- <div class="lg:ml-14">
                                        <div class="bg-gray-100 dark:bg-gray-700 ease-in duration-150 hover:bg-gray-200 pb-2 pt-1 px-3 rounded-sm">
                                            <select aria-label="select year"  class="text-xs text-gray-600 dark:text-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 rounded">
                                                <option class="leading-1">Year</option>
                                                <option class="leading-1">2020</option>
                                                <option class="leading-1">2019</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="flex items-end mt-6">
                                <h3 class="text-indigo-500 leading-5 text-lg md:text-2xl">20</h3>
                                <div class="flex items-center md:ml-4 ml-1 text-green-700">
                                    <p class="text-green-700 text-xs md:text-base">17%</p>
                                    <svg role="img" class="text-green-700" aria-label="increase. upward arrow icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path d="M6 2.5V9.5" stroke="currentColor" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8 4.5L6 2.5" stroke="currentColor" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4 4.5L6 2.5" stroke="currentColor" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <canvas id="myChart" width="1025" height="400" role="img" aria-label="line graph to show selling overview in terms of months and numbers" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

        {{-- <div class="flex items-center justify-center py-8 px-4">

        </div> --}}

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                var obj = <?php echo json_encode($label); ?>;
                const myBarChart2 = new Chart(document.getElementById("chartjs-2"), {
                    type: "pie",
                    data: { labels: obj, datasets: [{ data: [60, 12, 12, 25,12, 12, 25], fill: false, backgroundColor: [" #312E81", " #4338CA", " #4F46E5", " #4338CA"] }] },
                    options: {
                        legend: {
                            position: false,
                        },
                    },
                });

                const chart = new Chart(document.getElementById("myChart"), {
                type: "line",
                data: {
                    labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020"],
                    datasets: [
                        {
                            label: "16 Mar 2018",
                            borderColor: "#4A5568",
                            data: [30, 16, 17, 18, 11, 25, 35, 20, 24, 30, 12, 24],
                            fill: false,
                            pointBackgroundColor: "#4A5568",
                            borderWidth: "3",
                            pointBorderWidth: "4",
                            pointHoverRadius: "6",
                            pointHoverBorderWidth: "8",
                            pointHoverBorderColor: "rgb(74,85,104,0.2)",
                        },
                    ],
                },
                options: {
                    legend: {
                        position: false,
                    },
                    scales: {
                        yAxes: [
                            {
                                gridLines: {
                                    display: false,
                                },
                                display: false,
                            },
                        ],
                    },
                },
            });

            </script>
    </body>
    <footer class="bg-gradient-to-r from-green-600 to-green-900 shadow-inner">
                <div class="text-xs text-gray-200 text-center py-3.5">
                    <div class="">Sistem Informasi S3 Pertanian</div>
                    <div class="">Universitas Andalas</div>
                </div>
    </footer>
</html>
