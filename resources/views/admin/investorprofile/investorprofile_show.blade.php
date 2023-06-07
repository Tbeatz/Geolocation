<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1 investorprofile_header">
                            {{$profile->company_name}}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Detail information for this company") }}
                        </p>
                    </header>
                        <div class="max-w-full mx-auto">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="company_name" :value="__('Company Name')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('company_name', $profile?->company_name)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('company_reg_no', $profile?->company_reg_no)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="company_reg_date" :value="__('Company Registration Date')" />
                                    <x-text-input readonly type="date" class="w-full" :value="old('company_reg_date', $profile?->company_reg_date)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="permit_no" :value="__('Permit No.')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('permit_no', $profile?->permit_no)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="permit_date" :value="__('Permit Date')" />
                                    <x-text-input readonly type="date" class="w-full" :value="old('permit_date', $profile?->permit_date)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="permit_type_id" :value="__('Permit Type')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('permit_type_id', $profile?->permit_type?->name)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="commercial_date" :value="__('Commercial Date')" />
                                    <x-text-input readonly type="date" class="w-full" :value="old('commercial_date', $profile?->commercial_date)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="businesstype_detail" :value="__('Business Detail')" />
                                    <x-text-input readonly type="text" class="mt-1" :value="old('businesstype_detail', $profile?->businesstype_detail)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="investor_name" :value="__('Investor Name')" />
                                    <x-text-input readonly type="text" class="mt-1" :value="old('investor_name', $profile?->investor_name)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="investor_phone" :value="__('Phone No.')" />
                                    <x-text-input readonly type="text" class="mt-1" :value="old('investor_phone', $profile?->investor_phone)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="investor_email" :value="__('Email')" />
                                    <x-text-input readonly type="text" class="mt-1" :value="old('investor_email', $profile?->investor_email)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="hr_name" :value="__('HR Manager Name')" />
                                    <x-text-input readonly type="text" class="mt-1" :value="old('hr_name', $profile?->hr_name)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="hr_phone" :value="__('HR Phone No.')" />
                                    <x-text-input readonly type="text" class="mt-1" :value="old('hr_phone', $profile?->hr_phone)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="form_of_invest_id" :value="__('Form Of Investment')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('form_of_invest_id', $profile?->form_of_invest?->name)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2 hidden">
                                    <x-input-label for="local_invest" :value="__('Local Investment')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('local_invest', $profile?->local_invest)"/>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2 hidden">
                                    <x-input-label for="foreign_invest" :value="__('Foreign Investment')" />
                                    <x-text-input readonly type="text" class="w-full" :value="old('foreign_invest', $profile?->foreign_invest)"/>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
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
                            {{ __("Detail information of directors") }}
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
                    {{-- @include('user.dashboard.director_table') --}}
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
                    {{-- @include('user.dashboard.shareholder_table') --}}
                </section>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-arial font-semibold text-gray-700 mb-1">
                            {{ __('Geolocation') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Geolocation detail informatin") }}
                        </p>
                    </header>
                    <div class="container mx-auto max-w-full">
                        <x-input-label for="cover" :value="__('Preview')" />
                        @if ($profile->cover)
                            <div class="w-40 h-40 rounded-lg shadow-lg mt-3">
                                <img class="w-40 h-40 rounded-lg preview_cover" src="{{"/storage/$profile->cover"}}" alt="">
                            </div>
                        @else
                            <div class="w-40 h-40 rounded-lg shadow-lg mt-3">
                                <img class="w-40 h-40 preview_cover opacity-0" alt="">
                            </div>
                        @endif
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="country_id" :value="__('Country')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('country_id', $profile?->country?->name)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="type" :value="__('Investment Type')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('land_lease_contract_register',  @if ($profile->type == 0) 'Local' @else 'Foreign' @endif)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="land_area" :value="__('Land Area')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('land_area', $profile?->land_area)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="geolocation" :value="__('Geolocation')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('geolocation', $profile?->geolocation)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="land_plot_no" :value="__('Land Plot No.')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('land_plot_no', $profile?->land_plot_no)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="land_measure_no" :value="__('Land Plot Measurement No.')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('land_measure_no', $profile?->land_measure_no)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="street_no" :value="__('Street No.')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('street_no', $profile?->street_no)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="street_name" :value="__('Street Name')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('street_name', $profile?->street_name)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="region_id" :value="__('Region')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('region_id', $profile?->region?->name)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="district_id" :value="__('District')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('district_id', $profile?->districts?->name)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="township_id" :value="__('Township')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('township_id', $profile?->townships?->name)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="businesszone_id" :value="__('Business Zone')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('businesszone_id', $profile?->businesszone?->name)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="sector_id" :value="__('Sector')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('sector_id', $profile?->sector?->name)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="land_lease_contract_stamp" :value="__('Land Lease Contract Stamp (Yes/No)')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('land_lease_contract_stamp',  @if ($profile->land_lease_contract_stamp == 0) 'No' @else 'Yes' @endif)"/>
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-input-label for="land_lease_contract_register" :value="__('Land Lease Contract Register (Yes/No)')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('land_lease_contract_register',  @if ($profile->land_lease_contract_register == 0) 'No' @else 'Yes' @endif)"/>
                            </div>
                        </div>
                        <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <x-input-label for="landtype_id" :value="__('Land Type')" />
                                <x-text-input readonly type="text" class="mt-1" :value="old('landtype_id', $profile?->landtype?->name)"/>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
