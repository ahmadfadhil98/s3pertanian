<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600 ">
                    Database Bimbingan
                </div>
                <div class="text-xl font-bold text-gray-300 px-2 ">
                    -
                </div>
                <div class="text-base font-bold text-green-500 py-1 ">
                    Universitas Andalas
                </div>
            </div>

            <div class="flex mt-6">
                <div class="w-full md:w-1/2">
                    <button wire:click="showModal()" class="rounded-full focus:outline-none py-3 px-7 text-base font-bold bg-green-500 hover:bg-green-700 text-white">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                              </svg>
                        <div class="ml-2.5">Tambahkan Dosen</div></div>

                    </button>
                </div>
                <div class="w-full md:w-1/2">
                    <input wire:model="search" type="text" class="w-full focus:outline-none py-3 px-5 rounded-full text-gray-600" placeholder="Cari nama dosen ...">
                </div>
            </div>
                @if($isOpen)
                    @include('livewire.bimbingan.form')
                @endif

                @if($isDel)
                    @include('livewire.bimbingan.delete')
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
                    <thead class="">
                        <tr class="">
                            <th class="bg-yellow-300 text-base font-bold py-3 text-gray-600 rounded-tl-full rounded-bl-full w-20">No.</th>
                            <th class="bg-yellow-300 py-3 text-gray-600 w-auto">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 ml-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    <div class="ml-3">Nomor Induk Pegawai</div>
                                </div>
                            </th>
                            <th class="bg-yellow-300 py-3 text-gray-600 w-60">
                                <div class="text-center">
                                    <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Nama Dosen</div>
                                </div></div>
                            </th>
                            <th class="bg-yellow-300 py-3 text-gray-600 rounded-tr-full rounded-br-full w-80 ">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                      </svg>
                                    <div class="ml-3">Fakultas</div>
                                </div>
                            </th>
                            <th class="w-60"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($lecturers as  $key=>$lecturer)
                            <tr>
                                <td class="text-center text-base text-gray-600 py-4">Pembimbing {{ $lecturer->position }}</td>
                                <td class="text-left text-base text-gray-600 px-8">{{ $nip[$lecturer->lecturer_id] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold">{{ $name[$lecturer->lecturer_id] }}</td>
                                <td class="text-left text-base text-gray-600 px-1">{{ $faculties[$lecturer->lecturer_id] }}</td>
                                <td class="text-right">
                                    <button wire:click="edit({{ $lecturer->id }})"class="rounded-full text-sm font-bold bg-green-500 hover:bg-green-700 text-white py-2.5 px-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg>
                                    </button>
                                    <button wire:click="showDel({{ $lecturer->id }})"class="ml-1.5 rounded-full text-sm font-bold bg-red-500 hover:bg-red-700 text-white py-2.5 px-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{$lecturers->links()}}
                </div>

    </div>
</div>

