<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="text-base">
            Detail Disertasi
            @if ($this->user->type==1)
                {{ $students[$disertasis->student_id] }}
            @endif
        </div>

        @if($isOpen)
            @include('livewire.disertasi.form2')
        @endif

        @if($isOpen2)
            @include('livewire.disertasi.academic_form')
        @endif

        @if($isDProdis)
            @include('livewire.disertasi.d_academic')
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
                        <section class="flex justify-end">
                            <button type="button" wire:click="editdisertasi()" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Manage</button>
                        </section>
                    </div>
                    @foreach ($proses_disertasis as $proses_disertasi)
                        <div class="flex flex-col p-3 space-y-5 rounded-xl border border-black bg-white shadow-md">
                            <section class="text-sm font-thin text-orange-400">
                                September 20, 10:30 AM
                            </section>
                            <section class="text-3xl font-bold">
                                {{ $proses_disertasi->name }}
                            </section>
                            @if ($proses_disertasi->upload_lots!=null)
                                <section class="font-bold text-lg text-blue-900">
                                    File
                                </section>
                            @endif

                            @foreach ($academics as $academic)
                                @if($academic->type==1&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                    <section class="font-normal text-md text-gray-700">
                                    {{$academic->link_upload}}
                                </section>
                                @else
                                    Belum ada file yang di upload
                                @endif
                            @endforeach

                            @if ($proses_disertasi->link_lots!=null)
                                <section class="font-bold text-lg text-blue-900">
                                    Link
                                </section>
                            @endif

                            @foreach ($academics as $academic)
                                @if($academic->type==2&&$academic->proses_disertasi_id==$proses_disertasi->id)
                                    <section class="font-normal text-md text-gray-700">
                                    {{$academic->link_upload}}
                                </section>
                                @else
                                    Belum ada link yang di tautkan
                                @endif
                            @endforeach

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

