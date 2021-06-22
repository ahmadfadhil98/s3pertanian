<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="text-base">
            Detail Disertasi
        </div>

        <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">
            <div class="grid grid-cols-3 grid-rows-2 gap-4">
                <div class="col-span-2">
                    <div class="flex flex-col p-3 space-y-5 rounded-xl border border-black bg-white shadow-md">
                        <section class="text-sm font-thin text-orange-400">
                            September 20, 10:30 AM
                        </section>
                        <section class="text-3xl font-bold">
                            {{ $disertasi->title }}
                        </section>
                        <section class="font-normal text-md text-gray-700">
                            Engagement is the term used for likes, shares, comments, and other interactions with a business’ social media presence.
                        </section>
                        <section class="font-bold text-lg text-blue-900">
                            Belum ada
                        </section>
                        <section class="flex justify-end">
                            <button type="button" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Read more</button>
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
                            <section class="font-normal text-md text-gray-700">
                                Engagement is the term used for likes, shares, comments, and other interactions with a business’ social media presence.
                            </section>
                            <section class="font-bold text-lg text-blue-900">
                                Belum ada {{ $proses_disertasi->name }}
                            </section>
                            <section class="flex justify-end">
                                <button type="button" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Read more</button>
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
                            @if ($lecturers==[])
                                @foreach ($lecturers as $lecturer)
                                    <tr>
                                        <th class="w-1">Pembimbing</th>
                                        <td>:</td>
                                        <td> {{ $name[$lecturer->lecturer_id] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                Belum ada pembimbing
                            @endif
                        </table>
                        <section class="flex justify-end">
                            <button onclick="location.href=' {{ route( 'bimbingan') }} '" type="button" class="bg-yellow-600 text-white px-3 py-1 rounded-md">Read more</button>
                        </section>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

