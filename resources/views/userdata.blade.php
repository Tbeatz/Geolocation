<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2> --}}
        <div>
            @vite('resources/js/userdata.js')
            @if (session('message'))
            <div id="userdata-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-arial">
                    {{session('message')}}
                </div>
                <button type="button" id="userdata-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif
            @if (session('error'))
            <div id="userdatadel-msg" class="flex p-4 rounded-lg bg-red-50 text-red-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-arial">
                    {{session('error')}}
                </div>
                <button type="button" id="userdatadel-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-red-50 text-red-500 hover:bg-red-200" data-dismiss-target="#dash-msg" aria-label="Close">
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
                <div class="p-6 text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 mb-1 font-arial">
                                {{ __('Company Information') }}
                            </h2>
                            <p class="mb-4 font-semibold font-arial text-sm text-greenprimary">
                                {{ __('Manage the data') }}
                            </p>
                        </header>
                        <div class="relative w-72">
                            <form>
                                <input type="search" name="searchInput" id="searchInput" class="block p-2.5 w-full font-arial z-20 text-sm rounded-lg border bg-white border-gray-300 placeholder-gray-900 text-gray-700 focus:border-greenprimary" placeholder="Search...">
                                <button type="submit" id="userDataSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium rounded-r-lg border focus:ring-1 focus:outline-none bg-greenprimary hover:bg-green-700 focus:ring-green-700">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                        @include('companydatatable')
                        @include('reject-modal',[
                            'message' => 'Are you sure you want to delete?',
                        ])
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
