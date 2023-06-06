<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/user/investorlocation/investorlocation.js')
        </div>
        @if (session('message'))
        <div id="invloc-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-arial">
                {{session('message')}}
            </div>
            <button type="button" id="invloc-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#dash-msg" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
        @endif
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-arial font-semibold text-gray-700 mb-1">
                                {{ __('Geolocation') }}
                            </h2>
                            <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                                {{ __("Fill your informations") }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('geolocation.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div id="investor_profile" class="hidden">{{ json_encode($profile) }}</div>
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
                                <div class="flex flex-col mt-2">
                                    <div class="w-full">
                                        <x-input-label for="cover" :value="__('Cover')" />
                                        <input id="cover" name="cover" type="file" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none bg-white border-gray-300 placeholder-gray-400 mt-1 font-arial" id="default_size" :value="old('cover', $profiles->cover)" autofocus autocomplete="cover"/>
                                        <x-input-error class="mt-1" :messages="$errors->get('cover')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="country_id" :value="__('Country')" />
                                        <select id="country_id" name="country_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->country_id) selected @endif>Select an Option</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" @if ($profile->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('country_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="type" :value="__('Investment Type')" />
                                        <select name="type" id="type" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option selected value="0">Local</option>
                                            <option value="1">Foreign</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('type')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="land_area" :value="__('Land Area')" />
                                        <x-text-input id="land_area" name="land_area" type="text" class="mt-1" id="default_size" :value="old('land_area', $profile?->land_area)" required autofocus autocomplete="land_area" />
                                        <x-input-error class="mt-1" :messages="$errors->get('land_area')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="geolocation" :value="__('Geolocation')" />
                                        <x-text-input id="geolocation" name="geolocation" type="text" class="mt-1" id="default_size" :value="old('geolocation', $profile?->geolocation)" required autofocus autocomplete="geolocation" />
                                        <x-input-error class="mt-1" :messages="$errors->get('geolocation')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="land_plot_no" :value="__('Land Plot No.')" />
                                        <x-text-input id="land_plot_no" name="land_plot_no" type="text" class="mt-1" id="default_size" :value="old('land_plot_no', $profile?->land_plot_no)" required autofocus autocomplete="land_plot_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('land_plot_no')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="land_measure_no" :value="__('Land Plot Measurement No.')" />
                                        <x-text-input id="land_measure_no" name="land_measure_no" type="text" class="mt-1" id="default_size" :value="old('land_measure_no', $profile?->land_measure_no)" required autofocus autocomplete="land_measure_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('land_measure_no')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="street_no" :value="__('Street No.')" />
                                        <x-text-input id="street_no" name="street_no" type="text" class="mt-1" id="default_size" :value="old('street_no', $profile?->street_no)" required autofocus autocomplete="street_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('street_no')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="street_name" :value="__('Street Name')" />
                                        <x-text-input id="street_name" name="street_name" type="text" class="mt-1" id="default_size" :value="old('street_name', $profile?->street_name)" required autofocus autocomplete="street_name" />
                                        <x-input-error class="mt-1" :messages="$errors->get('street_name')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="region_id" :value="__('Region')" />
                                        <select id="region_id" name="region_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->region_id) selected @endif>Select a Region</option>
                                            @foreach ($regions as $region)
                                                <option value="{{$region->id}}" @if ($profile->region_id == $region->id) selected @endif>{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('region_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="district_id" :value="__('District')" />
                                        <select id="district_id" name="district_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->district_id) selected @endif>Select a District</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('district_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="township_id" :value="__('Township')" />
                                        <select id="township_id" name="township_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->township_id) selected @endif>Select a Township</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('township_id')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="businesszone_id" :value="__('Business Zone')" />
                                        <select id="businesszone_id" name="businesszone_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->businesszone_id) selected @endif>Select a Business Zone</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('businesszone_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="sector_id" :value="__('Sector')" />
                                        <select id="sector_id" name="sector_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->sector_id) selected @endif>Select an Option</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}" @if ($profile->sector_id == $sector->id) selected @endif>{{$sector->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('sector_id')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="land_lease_contract_stamp" :value="__('Land Lease Contract Stamp (Yes/No)')" />
                                        <select id="land_lease_contract_stamp" name="land_lease_contract_stamp" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->land_lease_contract_stamp == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->land_lease_contract_stamp == 1) selected @endif>Yes</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('land_lease_contract_stamp')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="land_lease_contract_register" :value="__('Land Lease Contract Register (Yes/No)')" />
                                        <select id="land_lease_contract_register" name="land_lease_contract_register" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->land_lease_contract_register == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->land_lease_contract_register == 1) selected @endif>Yes</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('land_lease_contract_register')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="landtype_id" :value="__('Land Type')" />
                                        <select id="landtype_id" name="landtype_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->landtype_id) selected @endif>Select an Option</option>
                                            @foreach ($landtypes as $landtype)
                                                <option value="{{$landtype->id}}" @if ($profile->landtype_id == $landtype->id) selected @endif>{{$landtype->name}}</option>
                                            @endforeach
                                            <option value="" class="otherlandtype">Other</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('landtype_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2 hidden" id="otherLandType">
                                        <x-input-label for="other_land_type" :value="__('Other Land Type')" />
                                        <x-text-input type="text" class="mt-1 other_land_type" name="other_land_type" id="default_size" autofocus autocomplete="other_land_type" />
                                        <x-input-error class="mt-1" :messages="$errors->get('other_land_type')" />
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
    </div>
</x-app-layout>
