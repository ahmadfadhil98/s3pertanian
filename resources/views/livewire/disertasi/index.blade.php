<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600 ">
                    Database Dosen
                </div>
                <div class="text-xl font-bold text-gray-300 px-2 ">
                    -
                </div>
                <div class="text-base font-bold text-green-500 py-1">
                    <div class="flex">
                        <div class="">Universitas Andalas</div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex mt-6">
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
                    <div class="py-2 px-6 mt-4" id="alert">
                        <div>
                            <h1 class="text-green-500 text-sm">{{ session('info') }}</h1>
                        </div>
                    </div>
                @endif

                @if(session()->has('delete'))
                    <div class="py-2 px-6 mt-4" id="alert">
                        <div>
                            <h1 class="text-red-500 text-sm">{{ session('delete') }}</h1>
                        </div>
                    </div>
                @endif

                @foreach ($disertasis as $key=>$disertasi)
                            <!-- start  -->
                            <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3 border-l-8 border-yellow-600">
                                    <div class="space-y-1 border-r-2 pr-3">
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




