<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600 ">
                    Database Disertasi
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
                    <button wire:click="showModal()" class="rounded-xl focus:outline-none py-3 px-7 text-base font-bold bg-green-500 hover:bg-green-700 text-white shadow-md">
                        <div class="flex ">
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
                            <div class="mx-auto bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl pr-7 py-5 mb-7">
                                <div class="flex">
                                    <div class="px-7 py-7 flex-1 bg-white shadow-md rounded-xl mr-6 text-gray-600">
                                        <div>
                                            <div class="text-sm font-normal pb-1.5">
                                                Mahasiwa:
                                                <span class="font-bold text-gray-600">{{ $students[$disertasi->student_id] }}</span>
                                            </div>
                                            @if ($disertasi->title)
                                                <div class="font-bold text-xl">{{ $disertasi->title }}</div>
                                            @else
                                                <div class="text-base leading-6 font-normal">Belum ada judul</div>
                                            @endif
                                            <div class="text-sm font-normal pb-1.5">
                                                Topik:
                                                <span class="font-bold text-gray-600">{{ $topics[$disertasi->topic_id] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex text-green-500 mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            <div class="text-sm font-bold text-gray-600 ml-3">
                                                Tim Pembimbing:
                                            </div>
                                        </div>
                                        <div class="pr-8 pl-7 pb-4 pt-6 flex-2 bg-white shadow-md rounded-xl text-gray-600 mr-5">
                                            @foreach ($lecturer as $lectur)
                                            @if($lectur->disertasi_id==$disertasi->id)
                                                <div class="flex text-sm pb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600 h-5 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>
                                                    Pembimbing
                                                    {{ $lectur->position }}:
                                                    <span class="ml-2 font-bold text-gray-600">{{ $lecturers[$lectur->lecturer_id] }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>

                                    <div>
                                        <div>
                                            <div class="flex text-green-500 mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                                  </svg>
                                            <div class="text-sm font-bold text-gray-600 ml-3">
                                                Status:
                                            </div>
                                        </div>
                                            <div class="flex rounded-xl text-sm bg-white text-green-500 py-3 px-5 mr-5 focus:outline-none">
                                                @php
                                                    echo $icons [$disertasi->status];
                                                @endphp
                                                <button class="pl-2 font-bold text-gray-600 focus:outline-none">
                                                    {{ $statuses [$disertasi->status] }}...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div>
                                        <div>
                                            <div class="flex rounded-xl text-base bg-green-500 hover:bg-green-700 text-white py-2.5 px-7 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <button class="pl-2 font-bold"onclick="location.href=' {{ route( 'ddisertasi',[$disertasi->id]) }} '">Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div>
                                        <div x-data="{ dropdownOpen: false }" class="relative">
                                            <button @click="dropdownOpen = !dropdownOpen" class="focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 text-gray-600 hover:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                  </svg>
                                            </button>

                                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                                            <div x-show="dropdownOpen" class="absolute right-0 pt-15 mr-10 w-30 rounded-md overflow-hidden z-20 pb-10">
                                                <div class="flex rounded-xl text-sm bg-yellow-300 hover:bg-yellow-400 text-gray-600 py-2.5 px-8 mb-2 shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <button class="pl-2 font-bold focus:outline-none"onclick="location.href=' {{ route( 'ddisertasi',[$disertasi->id]) }} '">Detail
                                                    </button>
                                                </div>

                                                <div class="flex rounded-xl text-sm bg-red-500 hover:bg-red-700 text-white py-2.5 px-8 shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <button class="pl-2 font-bold focus:outline-none" wire:click="showDel({{ $disertasi->id }})">Delete
                                                    </button>
                                                </div>
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




