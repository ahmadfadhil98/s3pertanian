<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600">
                    Database Topik Disertasi
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                              </svg>
                              <div class="ml-2.5">Tambah Topik Disertasi</div></div>
                            </button>
                        </div>
                        <div class="transform hover:scale-95 duration-300 bg-gray-300 w-full md:w-1/3 flex text-gray-400 pl-5 rounded-xl shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <input wire:model="search" type="text" class="ml-4 w-full bg-gray-200 focus:outline-none py-2.5 pl-5 text-gray-600 placeholder-gray-400 rounded-tr-xl rounded-br-xl shadow-inner" placeholder="Ketik topik disertasi...">
                        </div>
                    </div>
                @if($isOpen)
                    @include('livewire.topic.form')
                @endif

                @if($isDel)
                    @include('livewire.topic.delete')
                @endif

                @if(session()->has('info'))
                    <div class="py-2 px-6 mt-4">
                        <div>
                            <h1 class="text-green-500 text-sm">{{ session('info') }}</h1>
                        </div>
                    </div>
                @endif

                @if(session()->has('delete'))
                    <div class="py-2 px-6 mt-4">
                        <div>
                            <h1 class="text-red-500 text-sm">{{ session('delete') }}</h1>
                        </div>
                    </div>
                @endif

                <table class="table-fixed w-full mt-6">
                    <thead>
                        <tr>
                            <th style="background-color: #057954;" class="font-normal text-base py-2.5 text-white rounded-tl-xl rounded-bl-xl w-20">No.</th>
                            <th style="background-color: #057954;" class="font-normal text-base py-2.5 text-white rounded-tr-xl rounded-br-xl w-auto">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                      </svg>
                                    <div class="ml-3">Topik Disertasi</div>
                                </div>
                            </th>
                            <th class="w-48"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($topics as  $key=>$topic)
                            <tr>
                                <td class="text-center text-base text-gray-600 py-4">({{ $topics->firstitem() + $key }})</td>
                                <td class="text-left text-base text-gray-600 font-bold">{{ $topic->name }}</td>
                                <td class="text-right">
                                    <button style="background-color: #078CAA;" wire:click="edit({{ $topic->id }})"class="transform hover:scale-95 duration-300 rounded-xl text-sm font-bold text-white py-3 px-7 focus:outline-none shadow-md mr-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button style="background-color: #E42025;" wire:click="showDel({{ $topic->id }})"class="transform hover:scale-95 duration-300 rounded-xl text-sm font-bold text-white py-3 px-7 focus:outline-none shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{$topics->links('pagination_section')}}
                </div>
    </div>
</div>

