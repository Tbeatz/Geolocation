<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2> --}}
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @vite('resources/js/users.js')
            @if (session('message'))
                <div id="usersaccept-msg" class="flex p-4 text-green-800 rounded-lg bg-green-50 dark:bg-green-50 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-arial">
                        {{session('message')}}
                    </div>
                    <button type="button" id="usersaccept-close" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-50 dark:text-green-500 dark:hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div id="usersreject-msg" class="flex p-4 text-green-800 rounded-lg bg-green-50 dark:bg-green-50 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-arial">
                        {{session('error')}}
                    </div>
                    <button type="button" id="usersreject-close" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-50 dark:text-green-500 dark:hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            @endif
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
                        <div class="relative w-72">
                            <input type="search" name="searchInput1" id="searchInput1" class="block p-2.5 w-full font-arial z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:border-green-600" placeholder="Search...">
                            <button type="submit" id="usersSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-green-600 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-700">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                        @include('companyregistertable')
                        @include('confirm-modal', [
                                'message' => 'Are you sure you want to approve?',
                        ])
                        @include('reject-modal', [
                                'message' => 'Are you sure you want to reject?',
                        ])
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
