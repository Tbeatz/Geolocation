<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-neutral-200 shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
                                {{ __('Company Information') }}
                            </h2>
                            <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __("Edit Data") }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500 font-arial">
                                {{session('message')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('userdata.update', $userdata) }}" class="p-4 sm:p-8 bg-green-600 shadow sm:rounded-lg border-2 border-gray-300">
                            @csrf
                            @method('patch')
                            <div>
                                <h2 class="text-lg font-semibold text-gray-100 uppercase dark:text-green-400 mb-1">
                                    {{ __('Company Data') }}
                                </h2>
                                <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-300">
                                    {{ __("Fill the company information data correctly!") }}
                                </p>
                            </div>
                            <div class="m-auto w-3/4">
                                <div class="flex flex-row">
                                    <div class="w-full">
                                        <x-input-label for="investor_name">{{__('Investor Name')}}</x-input-label>
                                        <x-text-input style="width: 97%;" id="investor_name" name="investor_name" type="text" class="mt-1" id="default_size" :value="old('investor_name', $userdata?->investor_name)" required autofocus autocomplete="investor_name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('investor_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_name" :value="__('Company Name')" />
                                        <x-text-input style="width: 97%;" id="company_name" name="company_name" type="text" class="mt-1" id="default_size" :value="old('company_name', $userdata?->company_name)" required autofocus autocomplete="company_name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                        <x-text-input style="width: 97%;" id="company_reg_no" name="company_reg_no" type="text" class="mt-1" id="default_size" :value="old('company_reg_no', $userdata?->company_reg_no)" required autofocus autocomplete="company_reg_no" />
                                        <x-input-error class="mt-2" :messages="$errors->get('company_reg_no')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="businesstype_detail" :value="__('Business Type')" />
                                        <x-text-input style="width: 98%;" id="businesstype_detail" name="businesstype_detail" type="text" class="mt-1" id="default_size" :value="old('businesstype_detail', $userdata?->businesstype_detail)" required autofocus autocomplete="businesstype_detail" />
                                        <x-input-error class="mt-2" :messages="$errors->get('businesstype_detail')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="business_location" :value="__('Business Location')" />
                                        <x-text-input style="width: 98%;" id="business_location" name="business_location" type="text" class="mt-1" id="default_size" :value="old('business_location', $userdata?->business_location)" required autofocus autocomplete="business_location" />
                                        <x-input-error class="mt-2" :messages="$errors->get('business_location')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                                        <x-text-input style="width: 98%;" id="permit_no" name="permit_no" type="text" class="mt-1" id="default_size" :value="old('permit_no', $userdata?->permit_no)" required autofocus autocomplete="permit_no" />
                                        <x-input-error class="mt-2" :messages="$errors->get('permit_no')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="land_area" :value="__('Land Area')" />
                                        <x-text-input style="width: 98%;" id="land_area" name="land_area" type="text" class="mt-1" id="default_size" :value="old('land_area', $userdata?->land_area)" required autofocus autocomplete="land_area" />
                                        <x-input-error class="mt-2" :messages="$errors->get('land_area')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="country_id" :value="__('Countries')" />
                                        <select style="width: 98%; font-family:arial;" id="country_id" name="country_id" class="mt-1 border border-gray-300 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-500" required>
                                            <option value="" @if (!$userdata->country_id) selected @endif>Select an Option</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" @if ($userdata->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="sector_id" :value="__('Sectors')" />
                                        <select style="width: 98%; font-family:arial;" name="sector_id" id="sector_id" class="mt-1 border border-gray-300 text-gray-200 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-200 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-200" required>
                                            <option value="" @if (!$userdata->sector_id) selected @endif>Select an Option</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}" @if ($userdata->sector_id == $sector->id) selected @endif>{{$sector->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="geolocation" :value="__('Geolocation')" />
                                        <x-text-input style="width: 98%;" id="geolocation" name="geolocation" type="text" class="mt-1" id="default_size" :value="old('geolocation', $userdata?->geolocation)" required autofocus autocomplete="geolocation" />
                                        <x-input-error class="mt-2" :messages="$errors->get('geolocation')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="type" :value="__('Investment Type')" />
                                        <select style="width: 98%; font-family:arial;" name="type" id="type" class="mt-1 border border-gray-300 text-gray-200 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-200 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-200" required>
                                            <option @if ($userdata->type == 0) selected @endif value="0">Local</option>
                                            <option @if ($userdata->type == 1) selected @endif value="1">Foreign</option>
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                    </div>
                                </div>
                                {{-- <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="map_icon" :value="__('Map Icon')" />
                                        <input style="width: 99%; font-family:arial;" id="map_icon" name="map_icon" type="file" class="block mb-5 text-sm text-gray-200 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 focus:outline-none dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 mt-1" id="default_size" :value="old('map_icon', $user->map_icon)" required autofocus autocomplete="map_icon" />
                                        <x-input-error class="mt-2" :messages="$errors->get('form_of_invest_id')" />
                                    </div>
                                </div> --}}
                                <div class="flex items-center gap-2 mt-5">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    <a href="{{route('userdata.index')}}" class="font-arial text-semibold uppercase items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</a>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
