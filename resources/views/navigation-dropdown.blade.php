<nav x-data="{ open: false }" class="bg-gradient-to-r from-green-600 to-green-900 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img href="{{ route('dashboard') }}">
                        <img src="{{url('/img/logo_unand.png')}}" width="64">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-7 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <h1 class="text-base text-white hover:text-gray-100 font-bold pb-0.5">Home</h1>
                    </x-jet-nav-link>
                </div>

                @can('admin_manage')
                    <div class="hidden sm:flex sm:items-center sm:ml-8">
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">

                                <button class="flex items-center text-sm font-bold text-white hover:text-gray-100 focus:outline-none transition duration-150 ease-in-out">
                                    <div class="text-base">Manajemen Database</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="flex py-3 px-4 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                                        <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                                      <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                                      </svg>
                                    <div class="text-xs text-gray-400 ml-2">
                                        {{ __('Civitas Akademik') }}
                                    </div>
                                </div>

                                <div class="border-t border-gray-50"></div>

                                <x-jet-dropdown-link href="{{ route('lecturer') }}">
                                    <h2 class="text-sm text-gray-600">Dosen</h2>
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('student') }}">
                                    <h2 class="text-sm text-gray-600">Mahasiswa</h2>
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('staff') }}">
                                    <h2 class="text-sm text-gray-600">Staff</h2>
                                </x-jet-dropdown-link>

                            </x-slot>

                        </x-jet-dropdown>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-8">
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">

                                <button class="flex items-center text-sm font-bold text-white hover:text-gray-100 focus:outline-none transition duration-150 ease-in-out">
                                    <div class="text-base">Disertasi</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="flex py-3 px-4 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                                        <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                                      <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                                      </svg>
                                    <div class="text-xs text-gray-400 ml-2">
                                        {{ __('Data Disertasi') }}
                                    </div>
                                </div>

                                <div class="border-t border-gray-50"></div>

                                <x-jet-dropdown-link href="{{ route('topic') }}">
                                    <h2 class="text-sm text-gray-600">Bidang Ilmu</h2>
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('proses_disertasi') }}">
                                    <h2 class="text-sm text-gray-600">Proses Disertasi</h2>
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('disertasi') }}">
                                    <h2 class="text-sm text-gray-600">Disertasi</h2>
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endcan
                @can('lecturer_manage_bimbingan')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex px-1">
                        <x-jet-nav-link href="{{ route('bdisertasi') }}" :active="request()->routeIs('disertasi')">
                            <h1 class="text-base font-bold text-white hover:text-gray-100 font-bold">Disertasi</h1>
                        </x-jet-nav-link>
                    </div>
                @endcan
                @can('student_manage_disertasi')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex px-1">
                        <x-jet-nav-link href="{{ route('disertasi') }}" :active="request()->routeIs('disertasi')">
                            <h1 class="text-base font-bold text-white hover:text-gray-100 font-bold pb-0.5">Disertasi</h1>
                        </x-jet-nav-link>
                    </div>
                @endcan
                @can('admin_manage_file')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex px-1">
                        <x-jet-nav-link href="{{ route('file') }}" :active="request()->routeIs('file')">
                            <h1 class="text-base font-bold text-white hover:text-gray-100 font-bold pb-0.5">File</h1>
                        </x-jet-nav-link>
                    </div>
                @endcan
                @can('student_manage_file')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex px-1">
                        <x-jet-nav-link href="{{ route('file') }}" :active="request()->routeIs('file')">
                            <h1 class="text-base font-bold text-white hover:text-gray-100 font-bold pb-0.5">File</h1>
                        </x-jet-nav-link>
                    </div>
                @endcan
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-8">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block flex py-3 px-4 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                              </svg>
                            <div class="text-xs text-gray-400 ml-2">
                                    {{ __('Akun') }}
                            </div>
                        </div>

                        <div class="border-t border-gray-50"></div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profil') }}
                        </x-jet-dropdown-link>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->

</nav>

