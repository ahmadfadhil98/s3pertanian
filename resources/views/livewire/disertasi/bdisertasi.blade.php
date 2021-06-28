<div>
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mt-7">
                <div class="text-xl font-bold text-gray-600 ">
                    Database Mahasiswa Bimbingan
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

            <div class="flex mt-6">
                <div class="w-full md:w-1/2">

                </div>
                <div class="w-full md:w-1/2 flex text-gray-300 bg-white pl-5 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <input wire:model="search" type="text" class="w-full focus:outline-none py-3 pl-3 text-gray-600 placeholder-gray-300 rounded-xl" placeholder="Ketik nama dosen...">
                </div>
            </div>

                <table class="table-fixed w-full mt-6">
                    <thead>
                        <tr>
                            <th class="bg-yellow-300 text-base font-bold py-3 text-gray-600 rounded-tl-xl rounded-bl-xl w-20">No.</th>
                            <th class="bg-yellow-300 py-3 text-gray-600">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    <div class="ml-3">Nomor Induk Mahasiswa</div>
                                </div>
                            </th>

                            <th class="bg-yellow-300 py-3 text-gray-600">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Nama Mahasiswa</div>
                                </div>
                            </th>

                            <th class="bg-yellow-300 py-3 text-gray-600">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Judul Disertasi</div>
                                </div>
                            </th>

                            <th class="bg-yellow-300 py-3 text-gray-600 rounded-tr-xl rounded-br-xl">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                    <div class="ml-3">Status</div>
                                </div>
                            </th>
                            <th class=""></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($students as  $key=>$student)
                            <tr>
                                <td class="text-center text-base text-gray-600 py-4">{{ $students->firstitem() + $key }}.</td>
                                <td class="text-left text-base text-gray-600 px-6">{{ $stu_nim[$dis_stu[$student->disertasi_id]] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold">{{ $stu_name[$dis_stu[$student->disertasi_id]] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold">{{ $disertasi[$student->disertasi_id] }}</td>
                                <td class="text-left text-base text-gray-600 font-bold">{{ $statuses[$student->approve] }}</td>
                                    @if($student->approve==1)
                                    <td class="text-right">
                                        <button wire:click="agree({{ $student->id }})" class="rounded-full text-sm font-bold bg-green-500 hover:bg-green-700 text-white py-2.5 px-7"> Setuju
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button wire:click="reject({{ $student->id }})" class="rounded-full text-sm font-bold bg-red-500 hover:bg-red-700 text-white py-2.5 px-7"> Tolak
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </td>
                                    @else
                                    <td class="text-right">
                                        <button onclick="location.href=' {{ route( 'ddisertasi',[$student->disertasi_id]) }} '" class="rounded-full text-sm font-bold bg-green-500 hover:bg-green-700 text-white py-2.5 px-7"> Detail
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
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

