<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="text-base">

            Detail Disertasi
            @if ($this->user->type==1)
                {{ $students[$disertasis->student_id] }}
            @endif
        </div>

        @if($isOpen)
            @include('livewire.disertasi.edit_form')
        @endif

        @if($isOpenAcademic)
            @include('livewire.disertasi.academic_form')
        @endif

        <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">
            <div class="grid grid-cols-3 grid-rows-2 gap-4">
                <div class="col-span-2">
                    <div class="flex flex-col p-3 space-y-5 rounded-xl border border-black bg-white shadow-md">
                        <section class="text-sm font-thin text-orange-400">
                            September 20, 10:30 AM
                        </section>
                        <section class="text-3xl font-bold">
                            @if ($disertasis->title)
                                {{ $disertasis->title }}
                            @else
                                Belum ada judul
                            @endif
                        </section>
                        <section class="font-normal text-md text-gray-700">
                            @if ($disertasis->topic_id)
                                {{ $topics[$disertasis->topic_id] }}
                            @endif
                        </section>
                        <section class="font-bold text-lg text-blue-900">
                            {{ $statuses[$disertasis->status] }}
                        </section>
                        @can('student_manage_disertasi')
                            <section class="flex justify-end">
                                <button type="button" wire:click="editdisertasi()" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Manage</button>
                            </section>
                        @endcan
                        @can('admin_manage')
                            <section class="flex justify-end">
                                <button type="button" wire:click="editdisertasi()" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Manage</button>
                            </section>
                        @endcan

                    </div>
                    @foreach ($proses_disertasis as $proses_disertasi)
                        <div class="flex flex-col p-3 space-y-5 rounded-xl border border-black bg-white shadow-md">
                            <section class="text-sm font-thin text-orange-400">
                                September 20, 10:30 AM
                            </section>
                            <section class="text-3xl font-bold">
                                {{ $proses_disertasi->name }}
                            </section>
                            @if ($proses_disertasi->upload_lots!=null&&$academics->count()!=0)
                                <section class="font-bold text-lg text-blue-900">
                                    File
                                </section>
                            @else
                                Belum ada file yang di upload atau link yang di tautkan
                            @endif

                            @foreach ($academics as $academic)
                                @if ($c_file->where('proses_disertasi_id',$proses_disertasi->id)->count()!=0)
                                    @if($academic->type==1&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                        <section class="font-normal text-md text-gray-700">
                                            <table>
                                                <tr>
                                                    <td>{{$academic->link_upload}}</td>
                                                    <td>
                                                        <button wire:click="download({{ $academic->id }})" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>

                                    </section>
                                    @endif
                                @else
                                    Belum ada file yang di upload
                                @endif
                            @endforeach

                            @if ($proses_disertasi->link_lots!=null&&$academics->count()!=0)
                                <section class="font-bold text-lg text-blue-900">
                                    Link
                                </section>
                            @else
                                Belum ada file yang di upload atau link yang di tautkan
                            @endif

                            @foreach ($academics as $academic)
                                @if($c_link->where('proses_disertasi_id',$proses_disertasi->id)->count()!=0)
                                    @if($academic->type==2&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                        <section class="font-normal text-md text-gray-700">
                                            <a href="{{$academic->link_upload}}">{{$academic->link_upload}}</a>
                                        </section>
                                    @endif
                                @else
                                    Belum ada link yang di tautkan
                                @endif
                            @endforeach

                            @can('admin_manage')
                                <section class="flex justify-end">
                                    <button type="button"
                                    wire:click="academic({{$proses_disertasi->id}})"
                                    {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                    class="bg-yellow-600 text-white mx-1 px-3 py-1 rounded-md">Input File/Tautkan Link</button>
                                </section>
                            @endcan

                            @can('student_manage_disertasi')
                                <section class="flex justify-end">
                                    <button type="button"
                                    wire:click="academic({{$proses_disertasi->id}})"
                                    {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                    class="bg-yellow-600 text-white mx-1 px-3 py-1 rounded-md">Input File/Tautkan Link</button>
                                    <button type="button"
                                    wire:click="dprodis({{$proses_disertasi->id}})"
                                    {{-- onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '"  --}}
                                    class="bg-yellow-600 text-white mx-1 px-3 py-1 rounded-md">Liat Detail</button>
                                </section>
                            @endcan

                        </div>
                    @endforeach
                </div>
                <div class="row-span-2">
                    <div class="flex flex-col p-3 space-y-5 rounded-xl border border-black bg-white shadow-md">
                        <section class="text-3xl font-bold">
                            Dosen Pembimbing
                        </section>
                        <table class="text-left">
                            @if ($lecturers->count()!=0)
                                @foreach ($lecturers as $lecturer)
                                    <tr>
                                        <th
                                        class="w-auto">Pembimbing {{$lecturer->position}}</th>
                                        <td>:</td>
                                        <td> {{ $name[$lecturer->lecturer_id] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                Belum ada pembimbing
                            @endif
                        </table>
                        <section class="flex justify-end">
                            <button onclick="location.href=' {{ route( 'bimbingan',[$this->disertasiId]) }} '" type="button" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Manage</button>
                        </section>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

