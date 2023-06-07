<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2> --}}
        <div>
            @vite('resources/js/admin/investorprofile/investorprofile.js')
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-4 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 mb-1 font-arial">
                                {{ __('Investor Companies') }}
                            </h2>
                            <p class="mb-4 font-semibold font-arial text-sm text-greenprimary">
                                {{ __('Check the detail of Companies') }}
                            </p>
                        </header>
                        <div class="relative w-72">
                            <form>
                                <input type="search" name="investorprofileSearchInput" id="investorprofileSearchInput" class="block p-2.5 w-full font-arial z-20 text-sm rounded-lg border bg-white border-gray-300 placeholder-gray-900 text-gray-700 focus:border-greenprimary" placeholder="Search...">
                                <button type="submit" id="investorprofileSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white rounded-r-lg border focus:ring-1 focus:outline-none bg-greenprimary hover:bg-green-700 focus:ring-green-700">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                        @include('admin.investorprofile.investorprofile_table')
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
