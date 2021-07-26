<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full text-center pt-40">
        <div class="max-w-sm bg-white rounded-xl shadow-md mx-auto px-7 py-5">
            <div class="pb-5 text-base text-gray-500 font-semibold">Selamat Datang</div>
            <div class="py-5 rounded-xl shadow-inner bg-gray-50">
                <div class="grid justify-center text-gray-600">
                    <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                </div>
                <div class="mt-2 text-base font-bold text-gray-600">{{Auth::user()->name}}</div>
            </div>
            <div>
                <div class="pt-5 text-sm font-semibold text-green-500">Sistem Informasi S3 Pertanian</div>
                <div class="flex justify-center font-semibold text-sm text-green-500">
                    <div class="">Universitas Andalas</div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
