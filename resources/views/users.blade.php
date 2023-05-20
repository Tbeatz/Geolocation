<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2> --}}
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @vite('resources/js/users.js')
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-4 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-dark-100 mb-1 font-arial">
                                {{ __('Registered Companies') }}
                            </h2>
                            <p class="mb-4 font-semibold font-arial text-sm text-green-600 dark:text-green-600">
                                {{ __('Approve or Reject Companies') }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500 font-semibold font-arial">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="relative w-72">
                            <input type="search" name="searchInput1" id="searchInput1" class="block p-2.5 w-full font-arial z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:border-green-600" placeholder="Search...">
                            <button type="submit" id="usersSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-green-600 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-700">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                       @include('companyregistertable')
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
