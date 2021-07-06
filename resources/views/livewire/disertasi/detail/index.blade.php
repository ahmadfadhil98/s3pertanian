<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8 pb-2">
        <div class="flex mt-7">
            <div class="text-xl font-bold text-gray-600">
                Detail Disertasi
            </div>
            <div class="text-xl font-bold text-gray-300 px-2">
                -
            </div>
            <div class="text-base font-bold text-green-500 py-1">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    <div>
                        {{ $students[$disertasis->student_id] }} ({{ $nim[$disertasis->student_id] }})
                    </div>
                </div>
            </div>
        </div>

        @if($isOpen)
            @include('livewire.disertasi.edit')
        @endif

        @if($isDel)
            @include('livewire.disertasi.detail.delete')
        @endif

        @if($isOpenAcademic&&$this->type==1)
            @include('livewire.disertasi.detail.academic_form_file')
        @endif

        @if($isOpenAcademic&&$this->type==2)
            @include('livewire.disertasi.detail.academic_form_link')
        @endif

        <div class="mt-6">
            <div class="grid grid-cols-9 gap-6">
                <div class="col-span-5">
                    <div class="px-7 py-5 rounded-xl bg-white shadow-md mb-6">
                        <div class="pb-5">
                            <span class="text-sm text-gray-400">Updated:</span>
                            <span class="text-sm text-green-500">{{ date('d F Y, h:m A', strtotime($disertasis->updated_at)) }}</span>
                        </div>
                        <div class="bg-gray-50 rounded-md px-7 py-7 shadow-inner">
                        <section class="text-xl text-gray-600 pb-3">
                            @if ($disertasis->title)
                                {{ $disertasis->title }}
                            @else
                                Belum ada judul
                            @endif
                        </section>
                        <section>
                            @if ($disertasis->topic_id)
                                <span class="text-sm text-gray-400">Topik:</span>
                                <span class="text-sm text-gray-600 italic">{{ $topics[$disertasis->topic_id] }}</span>
                            @endif
                        </section>
                    </div>

                    <div class="flex w-full mt-5">
                        <div class="w-full flex">
                                <section class="flex rounded-xl text-{{ $colors [$disertasis->status] }} py-3 focus:outline-none w-30">
                                    @php
                                        echo $icons [$disertasis->status];
                                    @endphp
                                <span class="pl-2 text-sm text-gray-600 focus:outline-none">
                                {{ $statuses[$disertasis->status] }}</span>
                            </section>
                        </div>

                        @can('student_manage_disertasi')
                        <section class="">
                            <button style="background-color: #078CAA;" wire:click="editdisertasi()" class="transform hover:scale-95 duration-300 flex rounded-xl text-sm font-bold text-white py-3 px-6 focus:outline-none shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <div class="ml-3">
                                        Edit
                                    </div>
                            </button>
                        </section>
                        @endcan
                        @can('admin_manage')
                            <section class="">
                                <button style="background-color: #078CAA;" wire:click="editdisertasi()" class="transform hover:scale-95 duration-300 flex rounded-xl text-sm font-bold text-white py-3 px-6 focus:outline-none shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <div class="ml-3">
                                        Edit
                                    </div>
                                </button>
                            </section>
                        @endcan
                    </div>

                    </div>
                    @foreach ($proses_disertasis as $proses_disertasi)
                        <div class="flex flex-col px-7 py-5 rounded-xl bg-white shadow-md mb-6 text-gray-600">
                            <div class="text-sm text-green-500 pb-5">
                                <span class="text-sm text-gray-400">Updated:</span>
                                <span class="text-sm text-green-500">{{ date('d F Y, h:m A', strtotime($dateac->updated_at)) }}</span>
                            </div>
                            <div class="bg-gray-50 rounded-md px-7 py-5 shadow-inner mb-5">
                            <section class="text-xl pb-1">
                                {{ $proses_disertasi->name }}
                            </section>

                            @if ($c_academic->count()==0)
                            Belum ada file yang di upload atau link yang di tautkan
                            @endif

                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==1)
                                    <table class="table-fixed w-full mb-4">
                                        <tr>
                                            <td class="border-b-2 border-gray-200 text-base py-3 text-gray-600 w-auto">
                                                <div class="flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                      </svg>
                                                    <div class="ml-3">File</div>
                                                </div>
                                            </td>
                                            <td class="border-b-2 border-gray-200 w-40"></td>
                                        </tr>
                                @endif
                            @endforeach

                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==1)
                                    @foreach ($academics as $academic)
                                        @if($academic->type==1&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                            <tr>
                                                <td class="border-t-2 border-b-2 border-gray-200 text-left text-sm text-gray-600 py-3">
                                                    <div class="flex text-gray-600 rounded-xl">
                                                        {{$academic->keterangan}}
                                                    </div>
                                                </td>

                                                <td class="border-t-2 border-b-2 border-gray-200 text-right">
                                                    <button wire:click="download({{ $academic->id }})" class="transform hover:scale-95 duration-300 text-sm font-bold text-gray-500 focus:outline-none mr-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </button>
                                                    <button onclick="location.href=' {{ route( 'dacademic',[1,$academic->disertasi_id,$academic->id]) }} '" class="transform hover:scale-95 duration-300 text-sm font-bold text-gray-500 focus:outline-none mr-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                          </svg>
                                                    </button>
                                                    <button wire:click="showDel({{ $academic->id }},1)" class="transform hover:scale-95 duration-300 text-sm font-bold text-gray-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                                    </table>


                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==2)

                                <table class="table-fixed w-full mb-5">
                                        <tr>
                                            <td class="text-base py-3 text-gray-600 rounded-xl w-auto">
                                                <div class="flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                      </svg>
                                                    <div class="ml-3">Link</div>

                                                </div>

                                            </td>

                                            <td class="w-40 text-right">
                                                <button onclick="location.href=' {{ route( 'dacademic',[2,$this->disertasiId,$proses_disertasi->id]) }} '" class="transform hover:scale-95 duration-300 ml-3 rounded-xl text-sm font-bold text-gray-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                      </svg>
                                                </button>
                                            </td>
                                        </tr>
                                @endif
                            @endforeach

                            @foreach ($c_academic as $count)
                                @if ($count->proses_disertasi_id==$proses_disertasi->id&&$count->type==2)
                                    @foreach ($academics as $academic)
                                        @if($academic->type==2&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                            <tr>
                                                <td class="border-t-2 border-b-2 border-gray-200 text-left text-sm text-gray-600 py-3">
                                                    <div class="flex">
                                                        <a href="{{$academic->link_upload}}">
                                                        {{$academic->link_upload}}</a>
                                                    </div>
                                                </td>

                                                <td class="border-t-2 border-b-2 border-gray-200 text-right">
                                                    <button wire:click="download({{ $academic->id }})" class="transform hover:scale-95 duration-300 text-sm font-bold text-gray-500 focus:outline-none mr-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                        </svg>
                                                    </button>
                                                    <button wire:click="showDel({{ $academic->id }},2)" class="transform hover:scale-95 duration-300 text-sm font-bold text-gray-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>

                                            </section>
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach
                                    </table>

                            </div>

                            <section class="flex justify-end">

                                @can('admin_manage')

                                       <button style="background-color: #078CAA;" type="button"
                                       wire:click="academic({{$proses_disertasi->id}},1)"
                                       {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                       class="transform hover:scale-95 duration-300 flex rounded-xl text-sm font-bold text-white py-3 px-6 focus:outline-none shadow-md mr-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                         </svg>
                                       <div class="flex pl-3">Input File</div>
                                       </button>

                                       <button style="background-color: #078CAA;" type="button"
                                       wire:click="academic({{$proses_disertasi->id}},2)"
                                       {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                       class="transform hover:scale-95 duration-300 flex rounded-xl text-sm font-bold text-white py-3 px-6 focus:outline-none shadow-md">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                         </svg>
                                       <div class="flex pl-3"> Tautkan Link </div>
                                       </button>
                                   </section>
                               @endcan

                               @can('student_manage_disertasi')
                                   <section class="flex justify-end">
                                       <button type="button"
                                       wire:click="academic({{$proses_disertasi->id}},1)"
                                       {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                       class="flex bg-green-500 hover:bg-green-700 text-white text-sm font-bold px-4 py-3 rounded-xl mr-2 focus:outline-none shadow-md">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                       </svg>
                                       <div class="flex pl-2 pt-0.5">Input File</div>
                                       </button>

                                       <button type="button"
                                       wire:click="academic({{$proses_disertasi->id}},2)"
                                       {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                       class="flex bg-green-500 hover:bg-green-700 text-white text-sm font-bold px-4 py-3 rounded-xl mr-2 focus:outline-none shadow-md">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                       </svg>
                                       <div class="flex pl-2 pt-0.5"> Tautkan Link </div>
                                       </button>
                                       @endcan
                                   </section>


                        </div>
                    @endforeach
                </div>

                <div class="col-span-4">
                    <div class="bg-white rounded-xl pt-6 pb-5 px-7 shadow-md">
                        <div class="flex text-green-500 mb-5 ml-7">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            <div class="text-sm text-gray-600 ml-2.5">
                                Tim Pembimbing
                            </div>
                        </div>
                    <div class="flex flex-col px-7 py-6 rounded-xl bg-gray-100 shadow-inner">
                        <div>
                            <table class="text-left text-sm text-gray-600">
                                @if ($lecturers->count()!=0)
                                    @foreach ($lecturers as $lecturer)
                                        <tr class=" align-top">
                                            <th class="w-5 py-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </th>
                                            <th class="font-normal text-gray-600 py-1">
                                                Pembimbing
                                            </th>
                                            <th class="w-5 text-gray-600 font-normal py-1">
                                                {{$lecturer->position}}:
                                            </th>
                                            <th class="font-normal text-gray-600 py-1">{{ $name[$lecturer->lecturer_id] }}
                                            </th>
                                            @if ($approved->count()!=0)
                                                <th class="font-bold text-{{ $colors[$lecturer->approve]}} py-1">
                                                    @php
                                                        echo $icons [$lecturer->approve];
                                                    @endphp
                                                </th>
                                            @endif

                                        </tr>
                                    @endforeach
                                @else
                                    Belum ada pembimbing
                                @endif
                            </table>
                        </div>
                    </div>

                    <div class="mt-5">
                        @can('admin_manage')
                    <section class="flex justify-end">
                        <button style="background-color: #078CAA;" onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '" type="button" class="transform hover:scale-95 duration-300 flex justify-end rounded-xl focus:outline-none py-3 px-6 text-sm font-bold text-white shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <div class="ml-3">
                                Edit
                            </div>
                        </button>

                    </section>
                    @endcan
                    @can('student_manage_disertasi')
                    <section class="flex justify-end">
                        <button onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '" type="button" class="flex justify-end rounded-xl focus:outline-none py-3 px-7 text-sm font-bold bg-green-500 hover:bg-green-700 text-white shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>

                    </section>
                    @endcan
                    </div>


                </div>
                </div>
            </div>
        </div>

    </div>
</div>

