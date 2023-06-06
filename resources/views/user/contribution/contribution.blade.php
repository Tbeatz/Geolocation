<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/user/contribution/contribution.js')
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-4">
        <div id="capital-del-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" style="display: none;" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-arial capital_del_alert">
            </div>
            <button type="button" id="capital-del-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1">
                            {{ __('Capital Contribution') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Fill the information about Capital Contributions") }}
                        </p>
                    </header>
                    @include('user.contribution.capital_table')
                    @push('modal')
                        @include('user.contribution.capital_modal')
                        @include('reject-modal',[
                            'message' => 'Are you sure you want to delete?',
                        ]);
                    @endpush
                </section>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div id="noncapital-del-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" style="display: none;" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-arial noncapital_del_alert">
            </div>
            <button type="button" id="noncapital-del-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1">
                            {{ __('Non-Captial Contribution') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Fill the information about Non-Captial contributions") }}
                        </p>
                    </header>
                    @include('user.contribution.noncapital_table')
                    @push('modal')
                        @include('user.contribution.noncapital_modal')
                    @endpush
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
