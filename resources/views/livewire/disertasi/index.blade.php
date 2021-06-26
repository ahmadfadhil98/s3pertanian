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
                    <button wire:click="showModal()" class="rounded-xl focus:outline-none py-3 px-7 text-base font-bold bg-green-500 hover:bg-green-700 text-white">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        <div class="ml-2.5">Tambah Disertasi</div></div>
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

                <div class="mt-6">
                @foreach ($disertasis as $key=>$disertasi)
                        <!-- start  -->
                            <div class="mx-auto">
                                <div class="flex mb-5">
                                    <div class="px-7 py-7 flex-1 bg-white rounded-xl mr-5 text-gray-600">
                                        <div class="">
                                            <div class="text-sm font-normal pb-1.5">
                                                Mahasiwa : (Sesuai Nama Mahasiswa)
                                            </div>
                                            @if ($disertasi->title)
                                                <div class="font-bold text-xl">{{ $disertasi->title }}</div>
                                            @else
                                                <div class="text-base leading-6 font-normal">Belum ada judul</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="px-7 py-7 flex-2 bg-white rounded-xl text-gray-600 mr-5">
                                        <div class="text-lg font-bold pb-1.5">
                                            Tim Pembimbing
                                        </div>
                                            <div class="text-sm pb-1.5">
                                                Pembimbing 1: (Nama Dosen Pembimbing 1)
                                            </div>
                                            <div class="text-sm pb-1.5">
                                                Pembimbing 2: (Nama Dosen Pembimbing 2)
                                            </div>
                                            <div class="text-sm pb-1.5">
                                                Pembimbing 3: (Nama Dosen Pembimbing 3)
                                            </div>
                                            <div class="text-sm pb-1.5">
                                                Pembimbing 4: (Nama Dosen Pembimbing 4)
                                            </div>
                                    </div>
                                    <div class="">
                                        <div>
                                            <div class="flex rounded-xl text-base bg-yellow-300 text-gray-600 py-2.5 px-7 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <button class="pl-2 font-bold">
                                                    {{ $statuses [$disertasi->status] }}
                                                </button class="">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div class="flex rounded-xl text-base bg-green-500 hover:bg-green-700 text-white py-2.5 px-7 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <button class="pl-2 font-bold"onclick="location.href=' {{ route( 'ddisertasi',[$disertasi->id]) }} '">Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div x-data="{ dropdownOpen: false }" class="relative py-2.5">
                                            <button @click="dropdownOpen = !dropdownOpen" class="focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 text-gray-600 hover:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
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
                {{-- <h1>Halo</h1> --}}
                </div>
    </div>
</div>




