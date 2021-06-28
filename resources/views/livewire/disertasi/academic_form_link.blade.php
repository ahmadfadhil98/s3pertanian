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
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">TAMBAH DATA FILE
                            {{ $pd->name }}</h2>
                    </div>
                    <div>
                        <div class="mb-2">
                            <input wire:model="academicId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900">
                        </div>
                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                  </svg>
                                <div class="ml-3">Link</div>
                            </div>
                            <input wire:model="content" name="content" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2" placeholder="Input nama file">
                            @error('content') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                  </svg>
                                <div class="ml-3">Nama File</div>
                            </div>
                            <textarea wire:model="keterangan" name="keterangan"class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2" rows="4" placeholder="Input keterangan link"></textarea>
                            @error('keterangan') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                    </div>
                </div>
                <div class="px-6 mb-10">
                    <span class="flex w-full mb-3">
                    <button wire:click.prevent="storeacademic()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-green-500 hover:bg-green-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl">
                        Simpan
                    </button>
                    </span>
                    <span class="flex w-full">
                    <button wire:click="hideModal2()" type="button" class="inline-flex justify-center w-full px-4 py-2.5 bg-red-500 hover:bg-red-700 text-sm font-bold leading-6 text-white focus:outline-none rounded-xl">
                        Kembali
                    </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
