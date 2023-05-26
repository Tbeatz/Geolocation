<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/userdata-edit.js')
            @if (session('message'))
            <div id="userdataedit-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-arial">
                    {{session('message')}}
                </div>
                <button type="button" id="userdataedit-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
              </div>
            @endif
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1">
                                {{ __('Company Information') }}
                            </h2>
                            <p class="mb-4 font-semibold font-arial text-sm text-greenprimary">
                                {{ __("Edit Company Data") }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('userdata.update', $userdata) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="m-auto w-full">
                                <div class="flex flex-row">
                                    <div class="w-full">
                                        <x-input-label for="investor_name">{{__('Investor Name')}}</x-input-label>
                                        <x-text-input style="width: 97%;" id="investor_name" name="investor_name" type="text" class="mt-1" id="default_size" :value="old('investor_name', $userdata?->investor_name)" required autofocus autocomplete="investor_name" />
                                        <x-input-error class="mt-1" :messages="$errors->get('investor_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_name" :value="__('Company Name')" />
                                        <x-text-input style="width: 97%;" id="company_name" name="company_name" type="text" class="mt-1" id="default_size" :value="old('company_name', $userdata?->company_name)" required autofocus autocomplete="company_name" />
                                        <x-input-error class="mt-1" :messages="$errors->get('company_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                        <x-text-input style="width: 97%;" id="company_reg_no" name="company_reg_no" type="text" class="mt-1" id="default_size" :value="old('company_reg_no', $userdata?->company_reg_no)" required autofocus autocomplete="company_reg_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('company_reg_no')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="businesstype_detail" :value="__('Business Type')" />
                                        <x-text-input style="width: 98%;" id="businesstype_detail" name="businesstype_detail" type="text" class="mt-1" id="default_size" :value="old('businesstype_detail', $userdata?->businesstype_detail)" required autofocus autocomplete="businesstype_detail" />
                                        <x-input-error class="mt-1" :messages="$errors->get('businesstype_detail')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="business_location" :value="__('Business Location')" />
                                        <x-text-input style="width: 98%;" id="business_location" name="business_location" type="text" class="mt-1" id="default_size" :value="old('business_location', $userdata?->business_location)" required autofocus autocomplete="business_location" />
                                        <x-input-error class="mt-1" :messages="$errors->get('business_location')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                                        <x-text-input style="width: 98%;" id="permit_no" name="permit_no" type="text" class="mt-1" id="default_size" :value="old('permit_no', $userdata?->permit_no)" required autofocus autocomplete="permit_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('permit_no')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="land_area" :value="__('Land Area')" />
                                        <x-text-input style="width: 98%;" id="land_area" name="land_area" type="text" class="mt-1" id="default_size" :value="old('land_area', $userdata?->land_area)" required autofocus autocomplete="land_area" />
                                        <x-input-error class="mt-1" :messages="$errors->get('land_area')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="country_id" :value="__('Countries')" />
                                        <select style="width: 98%;" id="country_id" name="country_id" class="mt-1 text-sm p-2 block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$userdata->country_id) selected @endif>Select an Option</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" @if ($userdata->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('country_id')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="sector_id" :value="__('Sectors')" />
                                        <select style="width: 98%;" name="sector_id" id="sector_id" class="mt-1 p-2 text-sm block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$userdata->sector_id) selected @endif>Select an Option</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}" @if ($userdata->sector_id == $sector->id) selected @endif>{{$sector->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('sector_id')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="geolocation" :value="__('Geolocation')" />
                                        <x-text-input style="width: 98%;" id="geolocation" name="geolocation" type="text" class="mt-1" id="default_size" :value="old('geolocation', $userdata?->geolocation)" required autofocus autocomplete="geolocation" />
                                        <x-input-error class="mt-1" :messages="$errors->get('geolocation')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="type" :value="__('Investment Type')" />
                                        <select style="width: 98%;" name="type" id="type" class="mt-1 p-2 block text-sm w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option @if ($userdata->type == 0) selected @endif value="0">Local</option>
                                            <option @if ($userdata->type == 1) selected @endif value="1">Foreign</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('type')" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mt-5">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    <a href="{{route('userdata.index')}}" class="inline-flex items-center px-3 py-2 font-medium focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-red-600 hover:bg-red-700 focus:ring-red-800 font-arial">Back</a>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
