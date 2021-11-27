<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600">
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
                <div class="w-full md:w-2/3">
                    <button style="background-color: #078CAA;" wire:click="showModal()" class="transform hover:scale-95 duration-300 rounded-xl focus:outline-none py-2.5 px-7 text-base text-white shadow-md">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                              </svg>
                        <div class="ml-2.5">Tambah Dosen</div></div>
                    </button>
                    <button style="background-color: #078CAA;" wire:click="showImport()" class="transform hover:scale-95 duration-300 rounded-xl focus:outline-none py-2.5 px-7 text-base text-white shadow-md">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                              </svg>
                        <div class="ml-2.5">Import</div></div>
                    </button>
                </div>
                <div class="transform hover:scale-95 duration-300 bg-gray-50 w-full md:w-1/3 flex text-gray-400 pl-5 rounded-xl shadow-inner border-2 border-gray-200">
                    @include('search')
                </div>
            </div>
                @if($isOpen)
                    @include('livewire.lecturer.form')
                @endif

                @if($isImport)
                    @include('livewire.student.import')
                @endif

                @if($isDel)
                    @include('livewire.lecturer.delete')
                @endif

                <div style="display:none" x-data="{show: false}" x-show.transition.opacity.out.duration.1500ms="show" x-init="@this.on('saved',() => {show = true; setTimeout(()=>{show=false;},2000)})" class="py-2 px-6 mt-4" id="alert">
                    <div>
                        @if(session()->has('info'))
                            <h1 class="text-green-500 text-sm">{{ session('info') }}</h1>
                        @elseif(session()->has('delete'))
                            <h1 class="text-red-500 text-sm">{{ session('delete') }}</h1>
                        @endif
                    </div>
                </div>

                <table class="table-fixed w-full mt-6">
                    <thead>
                        <tr>
                            <th style="background-color: #057954;" class="font-normal text-base py-2.5 text-white rounded-tl-xl rounded-bl-xl w-20">No</th>
                            <th style="background-color: #057954;" class="font-normal text-base py-2.5 text-white w-60">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    <div class="ml-3">Nomor Induk Pegawai</div>
                                </div>
                            </th>
                            <th style="background-color: #057954;" class="font-normal text-base py-2.5 text-white w-auto">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Nama Dosen</div>
                                </div>
                            </th>
                            <th style="background-color: #057954;" class="font-normal text-base py-2.5 text-white rounded-tr-xl rounded-br-xl w-70">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                      </svg>
                                    <div class="ml-3">Fakultas Asal</div>
                                </div>
                            </th>
                            <th class="w-48"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lecturers as  $key=>$lecturer)
                            <tr>
                                <td class="text-center text-base text-gray-600 py-4">({{ $lecturers->firstitem() + $key }})</td>
                                <td class="text-left text-base text-gray-600">{{ $lecturer->nip }}</td>
                                <td class="text-left text-base text-gray-600">{{ $lecturer->name }}</td>
                                <td class="text-left text-base text-gray-600 px-1">{{ $faculties[$lecturer->faculty] }}</td>
                                <td class="text-right">
                                    <button style="background-color: #078CAA;" wire:click="edit({{ $lecturer->id }})"class="transform hover:scale-95 duration-300 rounded-full text-sm font-bold text-white py-3 px-3 focus:outline-none shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button style="background-color: #E42025;" wire:click="showDel({{ $lecturer->id }})"class="transform hover:scale-95 duration-300 ml-1.5 rounded-full text-sm font-bold text-white py-3 px-3 focus:outline-none shadow-md">
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
                    {{$lecturers->links('pagination_section')}}
                </div>
    </div>
</div>


