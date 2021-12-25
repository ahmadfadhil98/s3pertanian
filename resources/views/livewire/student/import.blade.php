<div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-gray-100 shadow-xl rounded-xl sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="sm:py-6 sm:px-6">
                    <div>
                        <h1 class="text-sm text-center text-gray-600">Database</h1>
                        <h2 class="mb-4 text-xl font-bold text-center text-gray-600">IMPORT MAHASISWA</h2>
                    </div>
                    <div>
                        <div>
                            <input wire:model="studentId" type="hidden" class="w-full px-3 py-2 text-blue-900 shadow appearance-none">
                        </div>

                        {{-- <div class="mb-2">
                            <div class="flex mb-2 text-sm font-bold text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                                <div class="ml-3">Nomor Induk Mahasiswa</div>
                            </div>
                            <input wire:model="nim" type="number" name="nim" class="w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Input NIM">
                            @error('nim') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div> --}}

                        <div class="mb-2">
                            <div class="flex mb-2 text-sm font-bold text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="ml-3">File Import</div>
                            </div>
                            <input wire:model="file" name="file" type="file" class="w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Input nama mahasiswa">
                            @error('file') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                    </div>

                    <div class="grid mt-6 justify-items-center">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <div class="ml-2 text-xs text-gray-400">Data Tersimpan dengan Aman</div>
                        </div>
                    </div>

                </div>

                <div class="px-6 mb-10">
                    <span class="flex w-full mb-3">
                        <button style="background-color: #078CAA;" wire:click.prevent="import()" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                            Simpan
                        </button>
                    </span>
                    <span class="flex w-full">
                        <button style="background-color: #E42025;" wire:click="hideImport()" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                            Kembali
                        </button>
                    </span>
                </div>
                <div wire:loading>
                    <img src="{{url('/img/loading.gif')}}" alt="Image" />
                </div>
            </form>

        </div>

    </div>
</div>
