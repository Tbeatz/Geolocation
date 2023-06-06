<nav x-data="{ open: false }" class="bg-greenprimary border-b border-greenprimary">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('users') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="font-semibold font-arial" :href="route('admindashboard')" :active="request()->routeIs('admindashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link class="font-semibold font-arial" :href="route('users')" :active="request()->routeIs('users')">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link class="font-semibold font-arial" :href="route('map')" :active="request()->routeIs('map')">
                        {{ __('Map') }}
                    </x-nav-link>
                    <x-nav-link class="font-semibold font-arial" :href="route('userdata.index')" :active="request()->routeIs('userdata.index')">
                        {{ __('User Data') }}
                    </x-nav-link>
                    <x-nav-link class="font-semibold font-arial" :href="route('sector')" :active="request()->routeIs('sector')">
                        {{ __('Sectors') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-green-400 bg-greenprimary hover:text-green-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                @if (Auth::user()->avatar)
                                    <img class="w-10 h-10 rounded-full ring-2 ring-gray-300" src="{{asset('storage/'.Auth::user()?->avatar)}}" alt="">
                                @elseif(!Auth::user()->avatar)
                                    <img class="w-10 h-10 rounded-full ring-1 ring-greenprimary" src="{{asset('img/user.png')}}" alt="">
                                @endif
                            </div>

                            <div class="ml-1">
                                <svg class="fill-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-400 hover:bg-green-500 focus:outline-none focus:bg-green-500 focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-5 w-5" stroke="white" fill="none" viewBox="0 0 24 24">
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
            <x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
                {{ __('Users') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('map')" :active="request()->routeIs('map')">
                {{ __('Map') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('userdata.index')" :active="request()->routeIs('userdata.index')">
                {{ __('User Data') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sector')" :active="request()->routeIs('sector')">
                {{ __('Sectors') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 border-gray-600">
            <div class="px-4">
                <div class="font-arial text-base font-semibold text-gray-800 text-white">{{ Auth::user()?->name }}</div>
                <div class="font-arial text-sm font-semibold text-gray-300">{{ Auth::user()?->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
