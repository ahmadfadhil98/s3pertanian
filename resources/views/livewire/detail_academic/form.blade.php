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
                        <h1 class="text-center text-sm text-gray-600">Penilaian</h1>
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">BERI NILAI</h2>
                    </div>
                <div>
                    <input type="hidden" wire:model="markingId" name="markingId">
                    <div>
                        <div class="flex text-sm text-gray-600 font-bold mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <div class="ml-3">Nilai</div>
                        </div>
                        <input type="number" wire:model="score" name="score" class="w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md">
                        @error('score') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div>
                        <div class="flex text-sm text-gray-600 font-bold mt-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                              </svg>
                            <div class="ml-3">Keterangan</div>
                        </div>
                        <textarea wire:model="keterangan" name="keterangan"class="w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none shadow-md" rows="4" placeholder="Input keterangan link"></textarea>
                        @error('keterangan') <h1 class="text-red-500">{{$message}}</h1>@enderror
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
                  <button style="background-color: #078CAA;" wire:click.prevent="store()" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                    Simpan
                  </button>
                </span>
                <span class="flex w-full">
                  <button style="background-color: #E42025;" wire:click="hideModal()" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                    Kembali
                  </button>
                </span>
              </div>
       </form>
      </div>

    </div>
  </div>
