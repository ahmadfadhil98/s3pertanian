<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen text-center sm:block">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>


        <div class="inline-block align-bottom bg-gray-100 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-2/3" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form action="{{route('disertasi.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="sm:py-6 sm:px-6">
                    <div>
                        <h1 class="text-center text-sm text-gray-600">Disertasi Mahasiswa</h1>
                        <h2 class="text-center text-xl font-bold mb-4 text-gray-600">TAMBAH DISERTASI</h2>
                    </div>
                    <div class="grid grid-cols-2 gap-7">
                        <div>
                            <div>
                                <input wire:model="disertasiId" type="hidden" class="shadow appearance-none w-full py-2 px-3 text-blue-900">
                            </div>
                            @if ($user->type!=3)
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
                            @else

                            @endif

                            <div class="mb-2">
                                <div class="flex text-sm text-gray-600 font-bold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                      </svg>
                                    <div class="ml-3">Bidang Ilmu</div>
                                </div>
                                {{ Form::select('topic_id',$topics,null,
                                ['class' => 'w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md','id' => 'topic_id','wire:model'=>'topic_id','placeholder'=>'- Pilih bidang ilmu -'])}}
                                @error('topic_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>

                            <div class="mb-2">
                                <div class="flex text-sm text-gray-600 font-bold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                      </svg>
                                    <div class="ml-3">Judul Disertasi</div>
                                </div>
                                <textarea rows="4" wire:model="title" name="title" class="w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md" placeholder="Input judul disertasi">
                                </textarea>
                                @error('title') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>
                        </div>
                        <div>
                            <div class="mb-2" x-data="{ selectedCity: '' }" x-init="
                                select2 = $($refs.lecturer1).select2();
                                select2.on('select2:select', (event) => {
                                    selectedCity = event.target.value;
                                });
                                $watch('selectedCity', (value) => {
                                    select2.val(value).trigger('change');
                                });">
                                <div class="flex text-sm text-gray-600 font-bold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-3">Pembimbing 1</div>
                                </div>

                                {{ Form::select('lecturer1',$lecturers,null,['class' => 'w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md','x-ref'=>'lecturer1','id' => 'lecturer1','wire:click'=>'onChange()','wire:model'=>'lecturer1','placeholder'=>'- Pilih pembimbing 1 -'])}}
                                @error('lecturer1') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>

                            <div class="mb-2"x-data="{ selectedCity2: '' }" x-init="
                                select2 = $($refs.lecturer2).select2();
                                select2.on('select2:select', (event) => {
                                    selectedCity2 = event.target.value;
                                });
                                $watch('selectedCity2', (value) => {
                                    select2.val(value).trigger('change');
                                });">
                                <div class="flex text-sm text-gray-600 font-bold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-3">Pembimbing 2</div>
                                </div>
                                {{ Form::select('lecturer2',$lecturers2,null,
                                ['class' => 'w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md','x-ref'=>'lecturer2','id' => 'lecturer2','wire:click'=>'onChange2()','wire:model'=>'lecturer2','placeholder'=>'- Pilih pembimbing 2 -'])}}
                                @error('lecturer2') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>

                            <div class="mb-2"x-data="{ selectedCity3: '' }" x-init="
                                select2 = $($refs.lecturer3).select2();
                                select2.on('select2:select', (event) => {
                                    selectedCity3 = event.target.value;
                                });
                                $watch('selectedCity3', (value) => {
                                    select2.val(value).trigger('change');
                                });">
                                <div class="flex text-sm text-gray-600 font-bold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-3">Pembimbing 3</div>
                                </div>
                                {{ Form::select('lecturer3',$lecturers3,null,
                                ['class' => 'w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md','x-ref'=>'lecturer3','id' => 'lecturer3','wire:click'=>'onChange3()','wire:model'=>'lecturer3','placeholder'=>'- Pilih pembimbing 3 -'])}}
                                @error('lecturer3') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>

                            <div class="mb-2 hidden" x-data="{ selectedCity4: '' }" x-init="
                                select2 = $($refs.lecturer4).select2();
                                select2.on('select2:select', (event) => {
                                    selectedCity4 = event.target.value;
                                });
                                $watch('selectedCity4', (value) => {
                                    select2.val(value).trigger('change');
                                });">
                                <div class="flex text-sm text-gray-600 font-bold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-3">Pembimbing 4</div>
                                </div>
                                {{ Form::select('lecturer3',$lecturers4,null,
                                ['class' => 'w-full py-2.5 px-4 text-sm text-gray-600 rounded-xl focus:outline-none mb-2 shadow-md','x-ref'=>'lecturer4','wire:click'=>'onChange4()','wire:model'=>'lecturer4','placeholder'=>'- Pilih pembimbing 4 -'])}}
                                @error('lecturer4') <h1 class="text-red-500">{{$message}}</h1>@enderror
                            </div>

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

                <div class="px-6 mb-10 w-full grid justify-items-center">
                    <span class="flex w-1/2 mb-3">
                        <button style="background-color: #078CAA;" type="submit" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                            Simpan
                          </button>
                    </span>
                    <span class="flex w-1/2">
                        <button style="background-color: #E42025;" onclick="location.href=' {{ route( 'disertasi') }} '" type="button" class="transform hover:scale-95 duration-300 inline-flex justify-center w-full py-2.5 text-sm leading-6 text-white focus:outline-none rounded-xl shadow-md">
                            Kembali
                          </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
