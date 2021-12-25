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
                        @if ($type=='F')
                            <h1 class="text-sm text-center text-gray-600">Input File</h1>
                        @else
                            <h1 class="text-sm text-center text-gray-600">Tautkan Link</h1>
                        @endif

                        <h2 class="text-xl font-bold text-center text-gray-600 uppercase">DATA {{ $pd->name }}</h2>
                    </div>
                    <div>
                        <div class="mb-2">
                            <input wire:model="academicId" type="hidden" class="w-full px-3 py-2 text-blue-900 border shadow appearance-none">
                        </div>
                        @if ($type=='F')
                            <div>
                                <div class="flex mb-2 text-sm font-bold text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <div class="ml-3">File</div>
                                </div>
                                <div class="relative flex items-center justify-center h-40 mb-4 bg-white shadow-md rounded-xl hover:cursor-pointer" x-data="{photoName: null}">
                                    <div class="absolute" x-show="! photoName">
                                        <div class="flex flex-col items-center "> <i class="text-gray-200 fa fa-cloud-upload fa-3x"></i> <span class="block pb-1 text-sm text-gray-400">Seret File ke sini</span> <span class="block pb-1 text-sm font-normal text-gray-600">atau</span> <span class="block text-sm font-normal text-green-500">Browse files</span> </div>
                                    </div>
                                    <div class="absolute" x-show="photoName">
                                        <div class="flex flex-col items-center ">
                                            <p class="px-10 text-sm text-center text-gray-600" x-text="photoName"></p>
                                        </div>
                                    </div>
                                    <input type="file" class="w-full h-full opacity-0" name="" wire:model="content"
                                    x-ref="content"
                                    x-on:change="
                                            photoName = $refs.content.files[0].name;" >
                                </div>
                                @error('content') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>
                        @else
                            <div class="mb-2">
                                <div class="flex mb-2 text-sm font-bold text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <div class="ml-3">Link</div>
                                </div>
                                <input wire:model="content" type="url" name="content" class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Copy kan link nya disini">
                                @error('content') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>
                        @endif
                        <div>
                            <div class="flex mb-2 text-sm font-bold text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                  </svg>
                                <div class="ml-3">Keterangan</div>
                            </div>
                            <textarea wire:model="keterangan" name="keterangan"class="w-full py-2.5 px-4 text-sm text-gray-400 rounded-xl focus:outline-none shadow-md" rows="4"
                                @if ($type=='F')
                                    placeholder="Input keterangan file"
                                @else
                                    placeholder="Input keterangan link"
                                @endif >
                            </textarea>
                            @error('keterangan') <h1 class="text-red-500">{{$message}}</h1>@enderror
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
    class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="grid justify-center w-full"><img src="{{url('/img/loading.gif')}}" width="45" alt="Image" /></div>

        </div>
    </div>
</div>
