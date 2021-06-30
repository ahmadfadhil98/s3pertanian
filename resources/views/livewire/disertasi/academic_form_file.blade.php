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
                            <div class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer" x-data="{photoName: null}">
                                <div class="absolute" x-show="! photoName">
                                    <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> <span class="block text-gray-400 font-normal">or</span> <span class="block text-blue-400 font-normal">Browse files</span> </div>
                                </div>
                                <div class="absolute" x-show="photoName">
                                    <div class="flex flex-col items-center ">
                                        <p x-text="photoName"></p>
                                    </div>
                                </div>
                                <input type="file" class="h-full w-full opacity-0" name="" wire:model="content"
                                x-ref="content"
                                x-on:change="
                                        photoName = $refs.content.files[0].name;" >
                            </div>
                            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
                            @error('content') <h1 class="text-red-500">{{$message}}</h1>@enderror
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
