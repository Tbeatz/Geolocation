<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2> --}}
        <div>
            @vite('resources/js/sector.js')
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-4 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 font-arial dark:text-dark-100 mb-1">
                                {{ __('Sectors') }}
                            </h2>
                            <p class="mb-4 font-semibold font-arial text-sm text-greenprimary dark:text-greenprimary">
                                {{ __('Manage icons for sectors') }}
                            </p>
                        </header>
                        <div class="relative w-72">
                            <form>
                                <input type="search" name="sectorInput" id="sectorInput" class="block p-2.5 w-full font-arial z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:border-greenprimary" placeholder="Search...">
                                <button type="submit" id="sectorSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-greenprimary hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-green-300 dark:bg-greenprimary dark:hover:bg-green-700 dark:focus:ring-green-700">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                        @include('sectortable')
                        @include('sectormodal')
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
