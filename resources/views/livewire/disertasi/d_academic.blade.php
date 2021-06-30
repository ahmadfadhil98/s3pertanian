<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


        <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <h1 class="font-bold text-center mb-4">
                            Detail
                        </h1>
                    </div>
                <div>
                <div>
                    @foreach ($proses_disertasis as $proses_disertasi)
                        @if ($proses_disertasi->id==$this->prodis)
                        <div class="flex flex-col px-7 py-7 rounded-xl bg-white shadow-md mb-5 text-gray-600">

                            <section class="text-sm text-green-500 pb-5">
                                September 20, 10:30 AM
                            </section>

                            <section class="text-xl font-bold">
                                {{ $proses_disertasi->name }}
                            </section>

                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==1)
                                    <table class="border-2">
                                        <tr>
                                            <td>Nama File</td>
                                            <td>Aksi</td>
                                        </tr>
                                @else
                                    @if($hashtag=0)
                                    Belum ada file yang di upload atau link yang di tautkan
                                    @endif
                                @endif
                                @php
                                    $hashtag=1;
                                @endphp
                            @endforeach

                            @php
                                $hashtag=0;
                            @endphp

                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==1)
                                    @foreach ($academics as $academic)
                                        @if($academic->type==1&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                            {{-- <section class="text-sm pb-8"> --}}
                                                {{-- <table> --}}
                                                    <tr>
                                                        <td>{{$academic->keterangan}}</td>
                                                        <td>
                                                            <button wire:click="download({{ $academic->id }})" class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                </svg>
                                                            </button>
                                                            <button wire:click="marking({{ $academic->id }})" class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="showDel({{ $academic->id }},1)" class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                  </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                {{-- </table> --}}

                                        {{-- </section> --}}
                                        @endif
                                    @endforeach
                                @else
                                    @if($hashtag=0)
                                    Belum ada file yang di upload
                                    @endif
                                @endif
                                @php
                                    $hashtag=1;
                                @endphp
                            @endforeach

                            @php
                                $hashtag=0;
                            @endphp
                                    </table>


                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==2)
                                    <table class="border-2">
                                        <tr>
                                            <td>Link</td>
                                            <td>Aksi</td>
                                        </tr>
                                @else
                                    @if($hashtag=0)
                                    Belum ada file yang di upload atau link yang di tautkan
                                    @endif
                                @endif
                                @php
                                    $hashtag=1;
                                @endphp
                            @endforeach
                            @php
                                $hashtag=0;
                            @endphp

                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==2)
                                    @foreach ($academics as $academic)
                                        @if($academic->type==2&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                            {{-- <section class="text-sm pb-8"> --}}
                                                <tr>
                                                    <td><a href="{{$academic->link_upload}}">{{$academic->link_upload}}</a></td>
                                                    <td>
                                                        <a href="{{$academic->link_upload}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                            </svg>
                                                        </a>
                                                        <button wire:click="marking({{ $academic->id }})" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                              </svg>
                                                        </button>
                                                        <button wire:click="showDel({{ $academic->id }},2)" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                              </svg>
                                                        </button>
                                                    </td>
                                                </tr>

                                            </section>
                                        @endif
                                    @endforeach
                                @else
                                    @if($hashtag=0)
                                    Belum ada link yang di tautkan
                                    @endif
                                    @php
                                        $hashtag=1;
                                    @endphp
                                @endif
                                @php
                                    $hashtag=0;
                                @endphp
                            @endforeach
                                    </table>
                            @php
                                $hashtag=0;
                            @endphp

                        </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="mt-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="hideAC()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Batal
                </button>
            </span>
        </div>
      </div>

    </div>
  </div>
