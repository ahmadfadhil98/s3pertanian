<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-gray-100 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="sm:py-6 sm:px-6">
                    <div>
                        <h1 class="text-center text-sm text-gray-600">Database</h1>
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">TAMBAH DOSEN</h2>
                    </div>
                    <div>
                        <div>
                            <input wire:model="lecturerId" type="hidden" class="shadow appearance-none w-full py-2 px-3 text-blue-900">
                        </div>

                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                                <div class="ml-3">Nomor Induk Pegawai</div>
                            </div>
                            <input wire:model="nip" type="number" name="nip" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Input NIP">
                            @error('nip') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="ml-3">Nama Dosen</div>
                            </div>
                            <input wire:model="name" name="name" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Input nama dosen">
                            @error('name') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div class="ml-3">Email</div>
                            </div>
                            <input wire:model="email" type="email" name="email" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Input email dosen">
                            @error('email') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div>
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <div class="ml-3">Fakultas</div>
                            </div>
                            {{ Form::select('faculty',$faculties,null,
                            ['class' => 'w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none shadow-md','id' => 'faculty','wire:model'=>'faculty','placeholder'=>'- Pilih fakultas -'])}}
                            @error('faculty') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                    </div>

                    <div class="grid justify-items-center mt-6">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                              </svg>
                            <div class="ml-2 text-xs text-gray-400">Data Tersimpan dengan Aman</div>
                        </div>
                    </div>

                </div>

        <div class="px-6 mb-10">
          <span class="flex w-full mb-3">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-green-500 hover:bg-green-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl shadow-md">
              Simpan
            </button>
          </span>
          <span class="flex w-full">
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-red-500 hover:bg-red-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl shadow-md">
              Kembali
            </button>
          </span>
        </div>

       </form>
      </div>

    </div>
  </div>
