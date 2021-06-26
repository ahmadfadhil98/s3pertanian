<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-green-900 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-gray-100 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="sm:py-8 sm:px-6">
                    <div>
                        <h1 class="text-center text-sm text-gray-600">Database</h1>
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">TAMBAH TOPIK DISTRIBUSI</h2>
                    </div>
                <div>
                <div class="mb-2">
                    <input wire:model="topicId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900">
                </div>
                <div>
                    <div class="flex text-sm text-gray-600 font-bold mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                        <div class="ml-3">Nomor Induk Mahasiswa</div>
                    </div>
                    <input wire:model="name" name="name" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none" placeholder="Input nama mahasiswa">
                    @error('name') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
            </div>
        </div>
        <div class="px-6 mb-10">
            <span class="flex w-full mb-3">
              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-green-500 hover:bg-green-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl">
                Simpan
              </button>
            </span>
            <span class="flex w-full">
              <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-red-500 hover:bg-red-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl">
                Kembali
              </button>
            </span>
          </div>
       </form>
      </div>

    </div>
  </div>
