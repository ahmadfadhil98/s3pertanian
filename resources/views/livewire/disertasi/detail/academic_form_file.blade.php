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
                        <h1 class="text-center text-sm text-gray-600">Input File</h1>
                        <h2 class="text-center text-xl font-bold text-gray-600 uppercase">DATA {{ $pd->name }}</h2>
                    </div>
                    <div>
                        <div class="mb-2">
                            <input wire:model="academicId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900">
                        </div>
                        <div>
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <div class="ml-3">File</div>
                            </div>
                            <div class="relative h-40 rounded-xl bg-white flex justify-center items-center hover:cursor-pointer shadow-md mb-4" x-data="{photoName: null}">
                                <div class="absolute" x-show="! photoName">
                                    <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span class="block text-sm text-gray-400 pb-1">Seret File ke sini</span> <span class="block text-sm text-gray-600 font-normal pb-1">atau</span> <span class="block text-sm text-green-500 font-normal">Browse files</span> </div>
                                </div>
                                <div class="absolute" x-show="photoName">
                                    <div class="flex flex-col items-center ">
                                        <p class="px-10 text-sm text-center text-gray-600" x-text="photoName"></p>
                                    </div>
                                </div>
                                <input type="file" class="h-full w-full opacity-0" name="" wire:model="content"
                                x-ref="content"
                                x-on:change="
                                        photoName = $refs.content.files[0].name;" >
                            </div>
                        </div>
                        <div>
                            <div class="flex text-sm text-gray-600 font-bold mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                  </svg>
                                <div class="ml-3">Keterangan</div>
                            </div>
                            <textarea wire:model="keterangan" name="keterangan"class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none shadow-md" rows="4" placeholder="Input keterangan file"></textarea>
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
                    <button style="background-color: #078CAA;" wire:click.prevent="storeacademic()" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                        Simpan
                    </button>
                    </span>
                    <span class="flex w-full">
                    <button style="background-color: #E42025;" wire:click="hideModal2()" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                        Kembali
                    </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<div
    wire:loading wire:target='content'
    class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom text-left overflow-hidden transform transition-all sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="grid justify-center w-full"><img src="{{url('/img/loading.gif')}}" width="45" alt="Image" /></div>

        </div>
    </div>
</div>
