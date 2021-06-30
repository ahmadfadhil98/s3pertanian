<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>


        <div class="inline-block align-bottom bg-gray-100 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-2/3" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="sm:py-6 sm:px-6">
                    <div>
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">PENILAIAN </h2>
                        <h3 class="text-center font-bold mb-4 text-gray-600">{{ $ketac[$this->filup] }}</h3>
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

                <div class="px-6 mb-10 w-full grid justify-items-center">
                    <span class="flex w-1/2 mb-3">
                      <button wire:click.prevent="storeMark()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-green-500 hover:bg-green-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl justify-center text-center shadow-md">
                        Simpan
                      </button>
                    </span>
                    <span class="flex w-1/2">
                      <button wire:click="hideMark()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-red-500 hover:bg-red-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl shadow-md">
                        Kembali
                      </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
