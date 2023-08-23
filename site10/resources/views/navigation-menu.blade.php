<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard-todo') }}" :active="request()->routeIs('dashboard-todo')">
                        {{ __('toDoList') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dashboard-todo2') }}" :active="request()->routeIs('dashboard-todo2')">
                        {{ __('toDoList2') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('dashboard-about') }}" :active="request()->routeIs('dashboard-about')">
                        {{ __('aboutWe') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                    width="50px" height="50px" viewBox="0 0 512 512"  xml:space="preserve">
                <style type="text/css">
                <![CDATA[
                    .st0{fill:#000000;}
                ]]>
                </style>
                <g>
                    <path class="st0" d="M124.755,221.208l4.234,5.813l131.516-101.828c-38.656-49.891-68.422-88.453-68.422-88.453
                        c-7.359-10.016-17.484-8.922-22.578,2.391l-5.969,13.313c-5.063,11.313-19.109,18.344-31.188,15.594L18.552,42.317
                        C6.474,39.583-1.729,47.333,0.317,59.567l8.609,51.094c2.031,12.219,13.625,24.359,25.75,27l63.672,13.75
                        c12.125,2.625,11.875,4.453-0.5,4.109l-35.531-1.094c-12.391-0.344-18.141,8.234-12.766,19.094
                        c5.375,10.891,19.75,21.594,31.922,23.875l7.891,1.453C101.552,201.114,117.474,211.161,124.755,221.208z"/>
                    <path class="st0" d="M508.317,245.27c-4.313-18.094-12.516-9.297-15.938-3.094c-2.781,5.047-28.703,58.297-69.813,90.344
                        c-25.094-31.031-86.219-109.531-139.219-177.859L150.802,257.286l17.188,24.531c-20,53.641-59.109,164.437-59.109,164.437
                        c-4.953,13.953,2.406,29.297,16.484,34.297c14.016,5.031,27.109-2.469,33.156-16.656l56.328-115.14l18.453,26.313
                        c-7,7.703-11.516,17.75-11.719,28.938l-0.25,12.078c-1.063,0-2.156,0-3.156,0c-58.469,0-61.719,64.953-3.25,64.953
                        c16.25,0,94.203,0,94.203,0s26,0,87.703,0c60.813,0,79.938-47.406,60.828-96.015C481.427,360.598,524.896,305.833,508.317,245.27z"
                        />
                </g>
                </svg>                                      

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                                </button>

                                
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                        width="75pt" height="42pt" viewBox="0 0 400 200"
                                        preserveAspectRatio="xMidYMid meet">
                                        <metadata>
                                        Created by potrace 1.16, written by Peter Selinger 2001-2019
                                        </metadata>
                                        <g transform="translate(0.000000,168.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path d="M1355 1670 c-82 -14 -109 -26 -171 -74 -50 -38 -67 -60 -106 -138
                                        -44 -86 -48 -101 -58 -207 -10 -103 -9 -145 6 -283 l5 -48 -31 0 c-25 0 -30
                                        -4 -26 -17 2 -10 10 -43 16 -73 9 -47 29 -100 30 -77 0 4 9 -2 20 -13 12 -12
                                        19 -32 18 -53 -1 -19 2 -39 6 -45 4 -7 1 -12 -8 -12 -9 0 -16 8 -16 19 0 11
                                        -4 23 -10 26 -26 16 7 -85 38 -118 17 -18 31 -48 38 -86 7 -32 24 -87 38 -123
                                        19 -47 26 -83 26 -132 0 -76 -10 -91 -87 -127 -22 -10 -65 -35 -93 -54 l-53
                                        -35 439 3 c242 2 451 6 466 9 16 4 30 2 34 -3 3 -5 16 -9 28 -9 19 0 25 7 30
                                        36 5 26 11 34 22 30 9 -3 20 -6 25 -6 5 0 18 -9 30 -21 27 -27 41 -13 37 37
                                        -3 36 -6 39 -35 42 -17 2 -46 -4 -63 -13 -28 -14 -31 -14 -37 1 -3 8 -6 48 -7
                                        88 -1 62 3 80 30 131 37 69 45 102 58 235 4 30 8 64 10 75 2 11 -2 28 -9 38
                                        -10 14 -13 9 -18 -41 -4 -32 -13 -75 -22 -95 -9 -21 -13 -42 -10 -46 3 -5 -1
                                        -11 -9 -14 -9 -4 -12 -14 -9 -25 6 -24 -14 -65 -28 -57 -5 4 -9 -3 -9 -14 0
                                        -12 -4 -21 -10 -21 -5 0 -10 -7 -10 -15 0 -9 -11 -27 -25 -41 -14 -14 -25 -30
                                        -25 -36 0 -23 -43 -127 -51 -123 -4 3 -10 -3 -14 -12 -8 -27 -73 -55 -88 -39
                                        -9 10 -14 10 -25 -1 -12 -12 -17 -12 -31 2 -24 21 -30 19 -42 -12 -6 -15 -13
                                        -23 -17 -18 -4 6 -16 17 -26 25 -18 14 -19 13 -13 -2 4 -12 1 -18 -9 -18 -9 0
                                        -12 5 -8 13 5 8 2 8 -9 -2 -15 -12 -17 -11 -17 5 0 14 -3 15 -12 6 -9 -9 -23
                                        -1 -60 39 -26 28 -48 53 -48 54 0 2 8 1 19 -2 32 -8 33 14 2 36 -16 12 -34 21
                                        -40 21 -6 0 -17 15 -25 33 -8 17 -15 26 -15 18 -2 -34 -81 104 -81 142 0 13
                                        -11 38 -25 57 -30 40 -50 101 -65 198 -11 68 -11 74 6 87 26 20 35 19 66 -10
                                        34 -32 70 -45 98 -38 21 6 20 7 -9 19 -36 15 -43 39 -8 29 21 -6 21 -5 3 9
                                        -10 8 -15 20 -11 26 5 8 10 6 19 -5 14 -20 54 -14 73 11 11 15 17 17 33 6 28
                                        -17 46 -16 30 2 -10 13 -8 13 15 3 14 -7 28 -22 31 -34 10 -39 24 -15 24 40
                                        -1 57 -15 81 -65 108 -39 22 -180 48 -227 42 -30 -4 -38 -2 -38 11 0 9 -5 16
                                        -10 16 -7 0 -8 13 -5 33 4 22 1 47 -10 73 -10 21 -19 63 -22 92 -4 48 -2 54
                                        28 81 17 16 52 34 78 41 25 6 63 16 84 22 21 7 55 10 75 9 20 -1 125 -5 232
                                        -7 180 -5 198 -7 230 -27 19 -12 44 -27 55 -33 28 -15 46 -77 46 -154 0 -35 5
                                        -70 11 -77 6 -8 12 -37 13 -66 5 -90 17 -201 26 -222 4 -11 8 -14 8 -7 1 6 8
                                        12 16 12 8 0 15 5 15 10 0 6 -4 10 -9 10 -16 0 -18 71 -2 98 11 21 16 72 19
                                        213 4 173 2 191 -17 234 -12 26 -21 57 -21 69 0 31 -29 74 -98 143 -80 81 -98
                                        92 -174 107 -72 15 -299 18 -373 6z"/>
                                        <path d="M1732 974 c-41 -7 -80 -18 -88 -25 -8 -6 -14 -8 -14 -5 0 11 -25 -17
                                        -39 -43 -7 -12 -10 -34 -6 -48 5 -20 11 -24 30 -20 20 3 25 0 25 -15 0 -18 1
                                        -18 22 2 l22 21 18 -23 c15 -20 20 -21 39 -10 11 8 18 9 14 3 -3 -6 -2 -11 4
                                        -11 5 0 13 9 16 20 7 24 18 25 34 6 8 -10 9 -16 1 -21 -7 -4 -5 -11 5 -21 13
                                        -14 18 -12 40 13 13 15 25 33 25 39 0 6 9 23 20 37 24 30 25 50 4 71 -8 9 -12
                                        16 -7 16 4 1 -3 7 -17 15 -30 17 -52 17 -148 -1z"/>
                                        <path d="M1400 514 c0 -28 50 -61 108 -70 23 -4 42 -10 42 -15 0 -5 4 -9 10
                                        -9 5 0 7 6 4 14 -6 15 5 25 36 31 30 6 80 44 80 61 0 12 -7 14 -32 9 -18 -4
                                        -45 -14 -60 -21 -35 -18 -58 -18 -87 2 -13 10 -41 18 -62 19 -35 2 -39 0 -39
                                        -21z"/>
                                        <path d="M1260 413 c0 -29 37 -82 57 -81 10 1 35 -9 56 -22 29 -17 35 -25 25
                                        -32 -10 -7 -10 -8 2 -7 23 3 110 -22 110 -32 0 -11 -27 -12 -32 -1 -1 5 -17
                                        12 -34 15 -27 5 -31 3 -27 -11 5 -21 61 -55 75 -46 5 3 12 -2 14 -12 5 -18 20
                                        -20 88 -15 4 1 5 8 2 17 -3 8 -2 12 4 9 11 -7 54 34 45 43 -3 4 -10 1 -14 -6
                                        -6 -10 -10 -10 -20 2 -10 12 -9 15 6 19 10 3 -13 5 -50 6 -66 1 -158 33 -142
                                        49 4 4 50 10 103 14 145 10 254 27 281 45 23 15 23 17 7 28 -20 15 -55 8 -63
                                        -11 -4 -10 -24 -14 -69 -14 -35 0 -64 -4 -64 -9 0 -5 -11 -8 -25 -8 -13 0 -23
                                        3 -20 6 2 4 -41 6 -97 5 -95 -3 -100 -2 -95 17 5 19 3 20 -45 22 -13 1 -29 7
                                        -36 14 -19 19 -42 16 -42 -4z"/>
                                        </g>
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('dashboard-todo') }}" :active="request()->routeIs('dashboard-todo')">
                {{ __('toDoList') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('dashboard-todo2') }}" :active="request()->routeIs('dashboard-todo2')">
                {{ __('toDo2List') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('dashboard-about') }}" :active="request()->routeIs('dashboard-about')">
                {{ __('aboutWe') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
