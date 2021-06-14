<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="text-base">
            Database Staff
        </div>

        <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">
            <div class="flex mb-4">
                <div class="w-full md:w-1/2">
                    <button wire:click="showModal()" class="text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                        Input Staff
                    </button>
                </div>
                <div class="w-full md:w-1/2">
                    <input wire:model="search" type="text" class="shadow appearance-none  w-full py-2 px-3 text-blue-900" placeholder="Cari staff...">
                </div>
            </div>
                @if($isOpen)
                    @include('livewire.staff.form')
                @endif

                @if($isDel)
                    @include('livewire.staff.delete')
                @endif

                @if(session()->has('info'))
                    <div class="bg-green-500 mb-4 py-2 px-6">
                        <div>
                            <h1 class="text-white text-sm">{{ session('info') }}</h1>
                        </div>
                    </div>
                @endif

                @if(session()->has('delete'))
                    <div class="bg-red-700 mb-4 py-2 px-6">
                        <div>
                            <h1 class="text-white text-sm">{{ session('delete') }}</h1>
                        </div>
                    </div>
                @endif

                <table class="table-fixed w-full text-center">
                    <thead class="bg-blue-900">
                        <tr>
                            <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                            <th class="text-base font-normal px-4 py-2 text-white w-auto">NIP</th>
                            <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama</th>
                            <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as  $key=>$staff)
                            <tr>
                                <td class="px-2 py-3">{{ $staffs->firstitem() + $key }}</td>
                                <td>{{ $staff->nip }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>
                                    <button wire:click="edit({{ $staff->id }})" class="text-sm bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                    Edit
                                    </button>
                                    <button wire:click="showDel({{ $staff->id }})" class="text-sm bg-red-700 hover:bg-red-900 text-white py-2 px-6">
                                    Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                </div>

        </div>

    </div>
</div>

