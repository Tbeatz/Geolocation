<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/user/dashboard/dashboard.js')
        </div>
        @if (session('message'))
            <div id="dash-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-arial">
                    {{session('message')}}
                </div>
                <button type="button" id="dash-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1">
                            {{ __('Company Information') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Fill your informations") }}
                        </p>
                    </header>
                    <form method="post" action="{{ route('dashboard.update') }}">
                        @csrf
                        @method('patch')
                        <div class="max-w-full mx-auto">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="company_name" :value="__('Company Name')" />
                                    <x-text-input id="company_name" name="company_name" type="text" class="w-full" :value="old('company_name', $profile?->company_name)" required autofocus autocomplete="company_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                    <x-text-input id="company_reg_no" name="company_reg_no" type="text" class="w-full" :value="old('company_reg_no', $profile?->company_reg_no)" required autofocus autocomplete="company_reg_no" />
                                    <x-input-error class="mt-2" :messages="$errors->get('company_reg_no')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="company_reg_date" :value="__('Company Registration Date')" />
                                    <x-text-input id="company_reg_date" name="company_reg_date" type="date" class="w-full" :value="old('company_reg_date', $profile?->company_reg_date)" required autofocus autocomplete="company_reg_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('company_reg_date')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="permit_no" :value="__('Permit No.')" />
                                    <x-text-input id="permit_no" name="permit_no" type="text" class="w-full" :value="old('permit_no', $profile?->permit_no)" required autofocus autocomplete="permit_no" />
                                    <x-input-error class="mt-2" :messages="$errors->get('permit_no')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="permit_date" :value="__('Permit Date')" />
                                    <x-text-input id="permit_date" name="permit_date" type="date" class="w-full" :value="old('permit_date', $profile?->permit_date)" required autofocus autocomplete="permit_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('permit_date')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="permit_type_id" :value="__('Permit Type')" />
                                    <select id="permit_type_id" name="permit_type_id" class="mt-1 p-2 text-sm block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                        <option value="" @if (!$profile?->permit_type_id) selected @endif>Select an Option</option>
                                        @foreach ($permit_types as $permit_type)
                                            <option value="{{$permit_type?->id}}" @if ($profile?->permit_type_id == $permit_type?->id) selected @endif>{{$permit_type?->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('permit_type_id')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="commercial_date" :value="__('Commercial Date')" />
                                    <x-text-input id="commercial_date" name="commercial_date" type="date" class="w-full" :value="old('commercial_date', $profile?->commercial_date)" autofocus autocomplete="commercial_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('commercial_date')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="businesstype_detail" :value="__('Business Detail')" />
                                    <x-text-input id="businesstype_detail" name="businesstype_detail" type="text" class="mt-1" id="default_size" :value="old('businesstype_detail', $profile?->businesstype_detail)" required autofocus autocomplete="businesstype_detail" />
                                    <x-input-error class="mt-1" :messages="$errors->get('businesstype_detail')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="investor_name" :value="__('Investor Name')" />
                                    <x-text-input id="investor_name" name="investor_name" type="text" class="mt-1" id="default_size" :value="old('investor_name', $profile?->investor_name)" required autofocus autocomplete="investor_name" />
                                    <x-input-error class="mt-1" :messages="$errors->get('investor_name')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="investor_phone" :value="__('Phone No.')" />
                                    <x-text-input id="investor_phone" name="investor_phone" type="text" class="mt-1" id="default_size" :value="old('investor_phone', $profile?->investor_phone)" required autofocus autocomplete="investor_phone" />
                                    <x-input-error class="mt-1" :messages="$errors->get('investor_phone')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="investor_email" :value="__('Email')" />
                                    <x-text-input id="investor_email" name="investor_email" type="text" class="mt-1" id="default_size" :value="old('investor_email', $profile?->investor_email)" required autofocus autocomplete="investor_email" />
                                    <x-input-error class="mt-1" :messages="$errors->get('investor_email')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="hr_name" :value="__('HR Manager Name')" />
                                    <x-text-input id="hr_name" name="hr_name" type="text" class="mt-1" id="default_size" :value="old('hr_name', $profile?->hr_name)" required autofocus autocomplete="hr_name" />
                                    <x-input-error class="mt-1" :messages="$errors->get('hr_name')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="hr_phone" :value="__('HR Phone No.')" />
                                    <x-text-input id="hr_phone" name="hr_phone" type="text" class="mt-1" id="default_size" :value="old('hr_phone', $profile?->hr_phone)" required autofocus autocomplete="hr_phone" />
                                    <x-input-error class="mt-1" :messages="$errors->get('hr_phone')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="form_of_invest_id" :value="__('Form Of Investment')" />
                                    <select name="form_of_invest_id" id="form_of_invest_id" class="mt-1 p-2 text-sm block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                        <option value="" @if (!$profile?->form_of_invest_id) selected @endif>Select an Option</option>
                                        @foreach ($form_of_invests as $form_of_invest)
                                            <option value="{{$form_of_invest?->id}}" @if ($profile?->form_of_invest_id == $form_of_invest?->id) selected @endif>{{$form_of_invest->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('form_of_invest_id')" />
                                </div>
                                <div id="local_invest_div" class="w-full md:w-1/2 px-2 mt-2 hidden">
                                    <x-input-label for="local_invest" :value="__('Local Investment')" />
                                    <x-text-input id="local_invest" name="local_invest" type="text" class="w-full" :value="old('local_invest', $profile?->local_invest)" required autofocus autocomplete="local_invest" />
                                    <x-input-error class="mt-2" :messages="$errors->get('local_invest')" />
                                </div>
                                <div id="foreign_invest_div" class="w-full md:w-1/2 px-2 mt-2 hidden">
                                    <x-input-label for="foreign_invest" :value="__('Foreign Investment')" />
                                    <x-text-input id="foreign_invest" name="foreign_invest" type="text" class="w-full" :value="old('foreign_invest', $profile?->foreign_invest)" required autofocus autocomplete="foreign_invest" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_invest')" />
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-4">
        <div id="director-del-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" style="display: none;" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-arial director_del_alert">
            </div>
            <button type="button" id="director-del-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
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
                            {{ __('Director Information') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Fill directors' informations") }}
                        </p>
                    </header>
                    <div class="relative w-72">
                        <form>
                            <input type="search" name="directorInput" id="directorInput" class="block p-2.5 w-full font-arial z-20 text-sm rounded-lg border bg-white border-gray-300 placeholder-gray-900 text-gray-700 focus:border-greenprimary" placeholder="Search...">
                            <button type="submit" id="directorSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium rounded-r-lg border focus:ring-1 focus:outline-none bg-greenprimary hover:bg-green-700 focus:ring-green-700">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                    </div>
                    @include('user.dashboard.director_table')
                    @push('modal')
                        @include('user.dashboard.director_modal')
                        @include('reject-modal',[
                            'message' => 'Are you sure you want to delete?',
                        ]);
                    @endpush
                </section>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div id="shareholder-del-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" style="display: none;" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-arial shareholder_del_alert">
            </div>
            <button type="button" id="shareholder-del-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
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
                            {{ __('Shareholder Information') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Fill shareholders' informations") }}
                        </p>
                    </header>
                    <div class="relative w-72">
                        <form>
                            <input type="search" name="shareholderInput" id="shareholderInput" class="block p-2.5 w-full font-arial z-20 text-sm rounded-lg border bg-white border-gray-300 placeholder-gray-900 text-gray-700 focus:border-greenprimary" placeholder="Search...">
                            <button type="submit" id="shareholderSearch" class="absolute top-0 right-0 p-2.5 text-sm font-medium rounded-r-lg border focus:ring-1 focus:outline-none bg-greenprimary hover:bg-green-700 focus:ring-green-700">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                    </div>
                    @include('user.dashboard.shareholder_table')
                    @push('modal')
                        @include('user.dashboard.shareholder_modal')
                    @endpush
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
