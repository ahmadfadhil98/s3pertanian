<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


        <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <h1 class="font-bold text-center mb-4">INPUT DISERTASI</h1>
                    </div>
                <div>
                <div class="mb-2">
                    <input wire:model="disertasiId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900">
                </div>
                @if ($user->type!=3)
                    <div class="mb-2">
                        <label for="student_id" class="block py-1">Mahasiswa</label>
                        {{ Form::select('student_id',$students,null,
                        ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'student_id','wire:model'=>'student_id','placeholder'=>'- Pilih mahasiswa -'])}}
                        @error('student_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                @else

                @endif

                <div class="mb-2">
                    <label for="title" class="block py-1">Judul Disertasi</label>
                    <input wire:model="title" name="title" class="shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm" placeholder="Input judul disertasi">
                    @error('title') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>

                <div class="mb-2">
                    <label for="lecturer1" class="block py-1">Pembimbing 1</label>
                    {{ Form::select('lecturer1',$lecturers,null,
                    ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'lecturer1','wire:click'=>'onChange()','wire:model'=>'lecturer1','placeholder'=>'- Pilih pembimbing 1 -'])}}
                    @error('lecturer1') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>

                <div class="mb-2">
                    <label for="lecturer2" class="block py-1">Pembimbing 2</label>
                    {{ Form::select('lecturer2',$lecturers2,null,
                    ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'lecturer2','wire:click'=>'onChange2()','wire:model'=>'lecturer2','placeholder'=>'- Pilih pembimbing 2 -'])}}
                    @error('lecturer2') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>

                <div class="mb-2">
                    <label for="lecturer3" class="block py-1">Pembimbing 3</label>
                    {{ Form::select('lecturer3',$lecturers3,null,
                    ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'lecturer3','wire:click'=>'onChange3()','wire:model'=>'lecturer3','placeholder'=>'- Pilih pembimbing 3 -'])}}
                    @error('lecturer3') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>

                <div class="mb-2">
                    <label for="lecturer4" class="block py-1">Pembimbing 4</label>
                    {{ Form::select('lecturer4',$lecturers4,null,
                    ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'lecturer4','wire:model'=>'lecturer4','placeholder'=>'- Pilih pembimbing 4 -'])}}
                    @error('lecturer4') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full border border-transparent px-4 py-2 bg-blue-700 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-900 focus:outline-none focus:border-blue-900 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Simpan
            </button>
          </span>
          <span class="mt-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Batal
            </button>
          </span>
        </div>
       </form>
      </div>

    </div>
  </div>
