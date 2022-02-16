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

            <script src='https://cdn.jsdelivr.net/npm/alpinejs@2.5.0/dist/alpine.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js'></script><script  src="./script.js"></script>


            <script>
                Number.prototype.comma_formatter = function() {
    return this.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

let chartData = function(){
    return {
        date: 'all',
        options: [
            {
                label: 'Pilih Parameter',
                value: 'all',
            },
            {
                label: 'Beasiswa',
                value: 'beasiswa',
            },
        ],
        showDropdown: false,
        selectedOption: 0,
        selectOption: function(index){
            this.selectedOption = index;
            this.date = this.options[index].value;
            this.renderChart();
        },
        data: null,
        fetch: function(){
            fetch('http://s3pertanian.test/json')
                .then(res => res.json())
                .then(res => {
                    this.data = res.dates;
                    this.renderChart();
                })
        },
        renderChart: function(){
            let c = false;

            Chart.helpers.each(Chart.instances, function(instance) {
                if (instance.chart.canvas.id == 'chart') {
                    c = instance;
                }
            });

            if(c) {
                c.destroy();
            }

            let ctx = document.getElementById('chart').getContext('2d');

            let chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: this.data.label,
                    datasets: [
                        {
                            label: "Masuk",
                            backgroundColor: "rgba(102, 126, 234, 0.25)",
                            borderColor: "rgba(102, 126, 234, 1)",
                            pointBackgroundColor: "rgba(102, 126, 234, 1)",
                            data: this.data[this.date].data.masuk,
                        },
                        {
                            label: "Wisuda",
                            backgroundColor: "rgba(237, 100, 166, 0.25)",
                            borderColor: "rgba(237, 100, 166, 1)",
                            pointBackgroundColor: "rgba(237, 100, 166, 1)",
                            data: this.data[this.date].data.wisuda,
                        },
                    ],
                },
                layout: {
                    padding: {
                        right: 10
                    }
                },
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                callback: function(value,index,array) {
                                    return value > 1000 ? ((value < 1000000) ? value/1000 + 'K' : value/1000000 + 'M') : value;
                                }
                            }
                        }]
                    }
                }
            });
        }
    }
}

            </script>
