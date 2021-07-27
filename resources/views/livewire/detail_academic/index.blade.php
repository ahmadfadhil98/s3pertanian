<div class="h-screen pb-4">
    <div class="max-w-screen-xl h-4/5 mx-auto sm:px-6 lg:px-8">
        <div class="flex mt-7">
            <div class="text-xl font-bold text-gray-600 ">
                Preview File
            </div>
            <div class="text-xl font-bold text-gray-300 px-2 ">
                -
            </div>
            <div class="text-base font-bold text-green-500 py-1">
                <div class="flex">
                    <div class="">Universitas Andalas</div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex mt-6 mb-6">
            <div class="w-full md:w-2/3">
                @can('lecturer_manage_bimbingan')
                    <button style="background-color: #078CAA;" wire:click="showModal()" class="transform hover:scale-95 duration-300 rounded-xl focus:outline-none py-2.5 px-7 text-base text-white shadow-md">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        <div class="ml-2.5">Beri Nilai</div></div>
                    </button>
                @endcan
            </div>
            <div class="flex w-full md:w-1/3 justify-end text-right h-full">
                <div class="flex bg-gray-50 border-2 border-gray-200 shadow-inner rounded-xl">
                    <div class="text-sm font-semibold text-gray-400 px-4 pt-2.5">Nilai</div>
                    <div class="flex bg-white px-7 py-1.5 rounded-tr-xl rounded-br-xl shadow-inner">
                        <div class="text-lg font-semibold text-gray-500 pt-0.5">
                            @if ($academic->mark==0)
                                Belum dinilai
                            @else
                                {{$academic->mark}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($isOpen)
            @include('livewire.detail_academic.form')
        @endif

        <div style="display:none" x-data="{show: false}" x-show.transition.opacity.out.duration.1500ms="show" x-init="@this.on('saved',() => {show = true; setTimeout(()=>{show=false;},2000)})" class="py-2 px-6 mt-4" id="alert">
            <div>
                @if(session()->has('info'))
                    <h1 class="text-green-500 text-sm">{{ session('info') }}</h1>
                @elseif(session()->has('delete'))
                    <h1 class="text-red-500 text-sm">{{ session('delete') }}</h1>
                @endif
            </div>
        </div>

        <div class="flex h-full w-full">
            <div>
            @if ($academic->keterangan)
                <div class="-mt-2 mb-4">
                    <fieldset class="pt-3 pb-4 px-6 border-2 border-gray-200 rounded-xl">
                        <legend class="-mx-1 px-2 text-sm font-semibold text-gray-400">Keterangan</legend>
                        <button style="background-color: #078CAA;" class="transform hover:scale-95 duration-300 rounded-full text-sm font-bold text-white py-3 px-3 focus:outline-none shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                        </button>
                        <textarea class="-ml-11 mb-12 bg-gray-100 text-gray-600 text-base focus:outline-none" cols="45" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio quis eos reprehenderit repudiandae dignissimos eaque fugit nulla odio earum totam omnis perspiciatis repellat iste, commodi ad nihil laudantium vero consectetur.
                        </textarea>
                    </fieldset>
                </div>
            @endif

            @if ($marks->count()!=0)
                <div>
                    <fieldset class="pt-3 pb-4 px-6 border-2 border-gray-200 rounded-xl">
                        <legend class="-mx-1 px-2 text-sm font-semibold text-gray-400">Penilaian Dosen</legend>
                        <div class="flex ml-0.5 w-96">
                            @foreach ($marks as $mark)
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-none text-sm text-gray-600 pr-2">
                                    Pembimbing {{ $positions[$mark->lecturer_id] }}:
                                </div>
                                <div class="flex-grow text-sm font-semibold text-gray-600 pr-2">
                                    {{ $lecturers[$mark->lecturer_id] }}
                                </div class="text-sm font-semibold text-gray-600 pr-2">
                                <div class="flex-none text-base text-right font-semibold text-gray-600">
                                    ( {{ $mark->score }} )
                                </div>
                            @endforeach
                        </div>
                        {{-- <table class="ml-0.5">
                            @foreach ($marks as $mark)
                                <tr>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    </td>
                                    <td class="text-sm text-gray-600 pr-2"> Pembimbing {{ $positions[$mark->lecturer_id] }}: </td>
                                    <td class="text-sm font-semibold text-gray-600 pr-2 w-48"></td>
                                    <td class="text-base text-right font-semibold text-gray-600">  </td>
                                </tr>
                            @endforeach

                        </table> --}}
                    </fieldset>
                </div>
            @endif
            </div>

            <div class="flex-1 mt-1 border-4 border-gray-600 rounded-xl shadow-md h-full ml-6">
                <div class="rounded-xl h-full" id="pdf-viewer">
                    <span class='text-sm text-gray-400 px-5'>Silahkan refresh terlebih dahulu...</span>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.min.js" integrity="sha512-K4UtqDEi6MR5oZo0YJieEqqsPMsrWa9rGDWMK2ygySdRQ+DtwmuBXAllehaopjKpbxrmXmeBo77vjA2ylTYhRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.js" integrity="sha512-eCQjXTTg9blbos6LwHpAHSEZode2HEduXmentxjV8+9pv3q1UwDU1bNu0qc2WpZZhltRMT9zgGl7EzuqnQY5yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    PDFObject.embed("{{ route('show-pdf', ['id' => $this->academicId]) }}", "#pdf-viewer");
</script>

