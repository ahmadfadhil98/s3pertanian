<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


        <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <h1 class="font-bold text-center mb-4">
                            Detail
                        </h1>
                    </div>
                <div>
                    @foreach ($proses_disertasis as $proses_disertasi)
                        @if ($proses_disertasi->id==$this->prodis)
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
                        </div>
                        @endif

                    @endforeach

            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="mt-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="hideDProdis()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Batal
                </button>
            </span>
        </div>
       </form>
      </div>

    </div>
  </div>
