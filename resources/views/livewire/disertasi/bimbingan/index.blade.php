<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600 ">
                   Data Disertasi Mahasiswa S3 Pertanian
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

            <div class="transform hover:scale-95 duration-300 bg-gray-50 w-full md:w-1/3 flex text-gray-400 pl-5 rounded-xl shadow-inner">
                @include('search')
            </div>

                <table class="table-fixed w-full mt-6">
                    <thead>
                        <tr>
                            <th class="bg-yellow-300 text-base font-bold py-3 text-gray-600 rounded-tl-xl rounded-bl-xl w-20">No</th>
                            <th class="bg-yellow-300 py-3 text-gray-600 w-20">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    <div class="ml-3">NIM</div>
                                </div>
                            </th>

                            <th class="bg-yellow-300 py-3 text-gray-600 w-45">
                                <div class="flex ml-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Nama Mahasiswa</div>
                                </div>
                            </th>

                            <th class="bg-yellow-300 py-3 text-gray-600 w-96">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Judul Disertasi</div>
                                </div>
                            </th>

                            <th class="bg-yellow-300 py-3 text-gray-600 rounded-tr-xl rounded-br-xl w-40">
                                <div class="flex ml-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Status</div>
                                </div>
                            </th>
                            <th class="w-60"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($students as  $key=>$student)
                            <tr>
                                <td class="text-center text-base text-gray-600">{{ $students->firstitem() + $key }}.</td>
                                <td class="text-left text-base text-gray-600">{{ $stu_nim[$dis_stu[$student->disertasi_id]] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold px-12">{{ $stu_name[$dis_stu[$student->disertasi_id]] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold py-2">{{ $disertasi[$student->disertasi_id] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold px-11">{{ $statuses[$student->approve] }}</td>
                                    @if($student->approve==1)
                                <td>
                                        <div class="flex">
                                            <button wire:click="agree({{ $student->id }})" class="flex rounded-xl text-sm font-bold bg-green-500 hover:bg-green-700 text-white py-3 px-5 focus:outline-none shadow-md mr-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                                <div class="ml-2.5">
                                                    Setujui
                                                </div>
                                            </button>

                                            <button wire:click="reject({{ $student->id }})" class="flex rounded-xl text-sm font-bold bg-red-500 hover:bg-red-700 text-white py-3 px-5 focus:outline-none shadow-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                                <div class="ml-2.5">
                                                    Tolak
                                                </div>
                                            </button>
                                        </div>

                                    </td>
                                    @else
                                    <td class="pl-16">
                                        <button onclick="location.href=' {{ route( 'ddisertasi',[$student->disertasi_id]) }} '" class="flex rounded-xl text-sm font-bold bg-yellow-300 hover:bg-yellow-400 text-gray-600 py-3 px-5 focus:outline-none shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                              </svg>
                                            <div class="ml-2">
                                                Detail
                                            </div>
                                        </button>

                                    </td>
                                    @endif


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{$students->links('pagination_section')}}
                </div>
    </div>
</div>

