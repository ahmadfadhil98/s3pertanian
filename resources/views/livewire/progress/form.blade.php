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
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">TAMBAH PROGRESS MAHASISWA</h2>
                    </div>
                <div>
                <div class="mb-2">
                    <input wire:model="progressId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900 shadow-md">
                </div>
                <div class="mb-2">
                    <div class="flex text-sm text-gray-600 font-bold mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-3">Nama Mahasiswa</div>
                    </div>
                    {{ Form::select('student_id',$students,null,
                    ['class' => 'w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md','id' => 'student_id','wire:model'=>'student_id','placeholder'=>'- Pilih mahasiswa -'])}}
                    @error('student_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
                <div class="mb-2">
                    <div class="flex text-sm text-gray-600 font-bold mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-3">Proses Disertasi Mahasiswa</div>
                    </div>
                    @include('livewire.progress.multiselect2')
                    @error('proses_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
            </div>

            <div class="grid justify-items-center mt-20">
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
