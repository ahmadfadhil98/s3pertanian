<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8 pb-1">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600 ">
                    Disertasi
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
                <div class="w-full md:w-2/3">
                    <button style="background-color: #078CAA;" wire:click="showModal()" class="transform hover:scale-95 duration-300 rounded-xl focus:outline-none py-2.5 px-7 text-base text-white shadow-md">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                              </svg>
                        <div class="ml-2.5">Tambah Disertasi</div></div>
                    </button>
                </div>
                <div class="transform hover:scale-95 duration-300 bg-gray-300 w-full md:w-1/3 flex text-gray-400 pl-5 rounded-xl shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <input wire:model="search" type="text" class="ml-4 w-full bg-gray-200 focus:outline-none py-2.5 pl-5 text-gray-600 placeholder-gray-400 rounded-tr-xl rounded-br-xl shadow-inner" placeholder="Ketik untuk mencari...">
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
                            <div class="mx-auto bg-white rounded-xl px-7 py-5 mb-6 shadow-md">
                                <div class="flex">
                                    <div class="px-7 py-7 flex-1 bg-gray-50 shadow-inner rounded-xl mr-7 text-gray-600">
                                        <div class="">
                                            <div class="text-sm font-normal pb-3.5 text-gray-400">
                                                Mahasiwa:
                                                <a href="{{route('ddisertasi',[$disertasi->id])}}"class="text-gray-500 font-semibold">
                                                {{ $disertasi->name }} ({{ $disertasi->nim }})
                                                </a>
                                            </div>
                                            @if ($disertasi->title)
                                                <div class="text-xl">
                                                    <a href="{{route('ddisertasi',[$disertasi->id])}}">
                                                    {{ $disertasi->title }}
                                                    </a>
                                                </div>
                                            @else
                                                <div class="text-base leading-6 font-normal">Belum ada judul</div>
                                            @endif
                                            <div class="text-sm font-normal pt-3.5 text-gray-400">
                                                Topik:
                                                <span class="text-gray-600 italic">{{ $topics[$disertasi->topic_id] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex text-green-500 mb-5 ml-7">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            <div class="text-sm text-gray-600 font-semibold ml-2.5">
                                                Tim Pembimbing
                                            </div>
                                        </div>
                                        <div class="px-7 pb-5 pt-7 flex-2 bg-gray-50 rounded-xl text-gray-600 mr-6 shadow-inner">
                                            @foreach ($lecturer as $lectur)
                                            @if($lectur->disertasi_id==$disertasi->id)
                                                <div class="flex text-sm pb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>
                                                    Pembimbing
                                                    {{ $lectur->position }}:
                                                    <span class="ml-2 text-gray-600 font-semibold">{{ $lecturers[$lectur->lecturer_id] }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>

                                    <div>
                                        <div>
                                            <div class="flex text-green-500 mb-5 ml-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                            <div class="text-sm text-gray-600 font-semibold ml-2">
                                                Status
                                            </div>
                                        </div>
                                            <div class="flex rounded-xl text-sm bg-gray-50 text-{{ $colors[$disertasi->status]}} py-3 px-5 mr-5 focus:outline-none shadow-inner">
                                                @php
                                                    echo $icons [$disertasi->status];
                                                @endphp
                                                <button class="pl-2 text-gray-600 focus:outline-none">
                                                    {{ $statuses [$disertasi->status] }}
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

                                            <div x-show="dropdownOpen" class="absolute right-0 pt-16 mr-10 rounded-md overflow-hidden z-20 pb-10">
                                                <button style="background-color: #078CAA;" class="transform hover:scale-95 duration-300 flex rounded-xl text-sm text-white py-3 pl-5 pr-8 mb-2 shadow-md focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <div class="pl-2 pr-1"onclick="location.href=' {{ route( 'ddisertasi',[$disertasi->id]) }} '">Detail
                                                    </div>
                                                </button>

                                                <button style="background-color: #E42025;" class="transform hover:scale-95 duration-300 flex rounded-xl text-sm text-white py-3 pl-5 pr-8 shadow-md focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <div class="pl-2" wire:click="showDel({{ $disertasi->id }})">Delete
                                                    </div>
                                                </button>
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




