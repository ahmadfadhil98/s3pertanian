<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}

    <!-- component -->
<!-- component -->
<div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
    <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md grid justify-items-center" >
        <img src="{{url('/img/logo_unand.png')}}" alt="Image" width="200"/>
        <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="px-5 py-7">
                    <div>
                        <x-jet-label class="font-semibold text-sm text-gray-600 pb-1 block" for="username" value="{{ __('Username') }}" />
                        <x-jet-input id="username" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" type="text" name="username" :value="old('username')" required autofocus />
                    </div>
                    <div>
                        <x-jet-label class="font-semibold text-sm text-gray-600 pb-1 block" for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <div class="block ">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <x-jet-button class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                        <span class="inline-block mr-2">Login</span>
                    </x-jet-button>
                    @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    <span class="inline-block ml-1">Forgot Password</span>
                            </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>


