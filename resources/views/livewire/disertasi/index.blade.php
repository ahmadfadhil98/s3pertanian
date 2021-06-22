<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="text-base">
            Database Disertasi
        </div>

        <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">
            <div class="flex mb-4">
                <div class="w-full md:w-1/2">
                    <button wire:click="showModal()" class="text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                        Ajukan Disertasi
                    </button>
                </div>
            </div>
                @if($isOpen)
                    @include('livewire.disertasi.form')
                @endif

                @if($isDel)
                    @include('livewire.disertasi.delete')
                @endif

                @if(session()->has('info'))
                    <div class="bg-green-500 mb-4 py-2 px-6">
                        <div>
                            <h1 class="text-white text-sm">{{ session('info') }}</h1>
                        </div>
                    </div>
                @endif

                @if(session()->has('delete'))
                    <div class="bg-red-700 mb-4 py-2 px-6">
                        <div>
                            <h1 class="text-white text-sm">{{ session('delete') }}</h1>
                        </div>
                    </div>
                @endif
                <!-- component -->
                <div class="container mx-auto bg-gray-50 min-h-screen p-8 antialiased">
                    <div>
                        @foreach ($disertasis as $key=>$disertasi)
                            <!-- start  -->
                            <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3 border-l-8 border-yellow-600">
                                    {{-- <div class="space-y-1 border-r-2 pr-3">
                                        <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500"> Release #</span> LTC08762304</div>
                                        <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500 pr"> BOL #</span> 10937</div>
                                        <div class="text-sm leading-5 font-semibold">JUN 14. 9:30 PM</div>
                                    </div> --}}
                                    <div class="flex-1">
                                        <div class="ml-3 space-y-1 border-r-2 pr-3">
                                            @if ($disertasi->title)
                                                <div class="text-base leading-6 font-normal">{{ $disertasi->title }}</div>
                                            @else
                                                <div class="text-base leading-6 font-normal">Belum ada judul</div>
                                            @endif
                                        <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Carrier</span> PAPER TRANSPORT INC.</div>
                                        <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Destination</span> WestRock Jacksonville - 9469 Eastport Rd, Jacksonville, FL 32218</div>
                                        </div>
                                    </div>
                                    <div class="border-r-2 pr-3">
                                        <div >
                                            <div class="ml-3 my-5 bg-yellow-600 p-1 w-20">
                                                <div class="uppercase text-xs leading-4 font-semibold text-center text-yellow-100">{{ $statuses [$disertasi->status] }}</div>
                                                </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="ml-3 my-5 bg-green-600 p-1 w-20">
                                            <div class="uppercase text-xs leading-4 font-semibold text-center text-green-100">
                                                <button onclick="location.href=' {{ route( 'ddisertasi',[$disertasi->id]) }} '">DETAIL</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div x-data="{ dropdownOpen: false }" class="relative">
                                            <button @click="dropdownOpen = !dropdownOpen" class="text-gray-100 rounded-sm my-5 ml-2 focus:outline-none bg-gray-500">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                            </svg>
                                            </button>

                                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                                            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">small <span class="text-gray-600">(640x426)</span></a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">medium <span class="text-gray-600">(1920x1280)</span></a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">large <span class="text-gray-600">(2400x1600)</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                        @endforeach

                    </div>
                </div>
        </div>

    </div>
</div>

