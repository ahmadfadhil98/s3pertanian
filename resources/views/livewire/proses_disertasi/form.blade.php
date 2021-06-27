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
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">TAMBAH PROSES DISERTASI</h2>
                    </div>
                    <div>
                        <div>
                            <input wire:model="pdId" type="hidden" class="shadow appearance-none w-full py-2 px-3 text-blue-900">
                        </div>

                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                  </svg>
                                <div class="ml-3">Nama Proses</div>
                            </div>
                            <input wire:model="name" name="name" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2" placeholder="Input nama proses">
                            @error('name') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                  </svg>
                                <div class="ml-3">Jumlah File</div>
                            </div>
                            <input wire:model="upload_lots" type="number" name="upload_lots" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2" placeholder="Input jumlah file">
                            @error('upload_lots') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div class="mb-2">
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                <div class="ml-3">Jumlah Link</div>
                            </div>
                            <input wire:model="link_lots" type="number" name="link_lots" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2" placeholder="Input jumlah link">
                            @error('link_lots') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div>
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                <div class="ml-3">Syarat Proses</div>
                            </div>
                            {{ Form::select('terms_id',$pd,null,
                            ['class' => 'w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none','id' => 'terms_id','wire:model'=>'terms_id','placeholder'=>'- Pilih syarat proses-'])}}
                            @error('terms_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
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
