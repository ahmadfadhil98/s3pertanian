<div>
    @if ($paginator->hasPages())
    <div class="py-3 flex items-center border-t-2 border-gray-200">
        <div class="mt-1 hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-600">
              Ditemukan
              <span class="font-medium font-semibold text-green-500">
                  {{$paginator->total()}}
              </span>
              hasil
            </p>
          </div>
          <div>
            <nav class="relative z-0 inline-flex rounded-xl" aria-label="Pagination">
                <span>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <a class="mx-2 relative inline-flex items-center px-4 py-1 text-gray-400 hover:text-gray-600 bg-white hover:bg-gray-200 leading-5 rounded-xl focus:outline-nonee shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                          </a>
                    @else
                        <button wire:click="previousPage" class="mx-2 relative inline-flex items-center px-4 py-1 text-gray-400 hover:text-gray-600 bg-white hover:bg-gray-200 leading-5 rounded-xl focus:outline-none shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                          </button>
                    @endif
                </span>
                <ul>
                    @foreach ($elements as $element)
                    <div class="flex">
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    {{-- {{$url}}    --}}
                                    <li class="w-10 mx-1 px-2 py-1 text-center text-sm rounded-xl bg-yellow-300 text-gray-600 cursor-pointer shadow-md" wire:click="gotoPage({{$page}})">{{$page}}</li>
                                @else
                                    <li class="w-10 mx-1 px-2 py-1 text-center text-sm text-gray-400 hover:text-gray-600 rounded-xl bg-white hover:bg-gray-200 cursor-pointer shadow-md" wire:click="gotoPage({{$page}})">{{$page}}</li>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endforeach
                </ul>

                <span>
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="mx-2 relative inline-flex items-center px-4 py-1 text-gray-400 hover:text-gray-600 bg-white hover:bg-gray-200 leading-5 rounded-xl focus:outline-none shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                        </button>
                    @else
                        <span class="mx-2 relative inline-flex items-center px-4 py-1 text-gray-400 hover:text-gray-600 bg-white hover:bg-gray-200 leading-5 rounded-xl focus:outline-none shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </span>
            </nav>
          </div>
        </div>
    </div>

    @endif
</div>
