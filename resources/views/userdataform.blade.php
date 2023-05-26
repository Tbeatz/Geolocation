<x-app-layout>
    <x-slot name="header">
        <div></div>
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1">
                                {{ __('Company Information') }}
                            </h2>
                            <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                                {{ __("Fill the information") }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('userdata.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div class="m-auto w-full">
                                <div class="flex flex-row">
                                    <div class="w-full">
                                        <x-input-label for="investor_name" :value="__('Investor Name')" />
                                        <x-text-input style="width: 97%;" id="investor_name" name="investor_name" type="text" class="mt-1" id="default_size" :value="old('investor_name')" required autofocus autocomplete="investor_name" />
                                        <x-input-error class="mt-1" :messages="$errors->get('investor_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_name" :value="__('Company Name')" />
                                        <x-text-input style="width: 97%;" id="company_name" name="company_name" type="text" class="mt-1" id="default_size" :value="old('company_name')" required autofocus autocomplete="company_name" />
                                        <x-input-error class="mt-1" :messages="$errors->get('company_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                        <x-text-input style="width: 97%;" id="company_reg_no" name="company_reg_no" type="text" class="mt-1" id="default_size" :value="old('company_reg_no')" required autofocus autocomplete="company_reg_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('company_reg_no')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="businesstype_detail" :value="__('Business Type')" />
                                        <x-text-input style="width: 98%;" id="businesstype_detail" name="businesstype_detail" type="text" class="mt-1" id="default_size" :value="old('businesstype_detail')" required autofocus autocomplete="businesstype_detail" />
                                        <x-input-error class="mt-1" :messages="$errors->get('businesstype_detail')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="business_location" :value="__('Business Location')" />
                                        <x-text-input style="width: 98%;" id="business_location" name="business_location" type="text" class="mt-1" id="default_size" :value="old('business_location')" required autofocus autocomplete="business_location" />
                                        <x-input-error class="mt-1" :messages="$errors->get('business_location')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                                        <x-text-input style="width: 98%;" id="permit_no" name="permit_no" type="text" class="mt-1" id="default_size" :value="old('permit_no')" required autofocus autocomplete="permit_no" />
                                        <x-input-error class="mt-1" :messages="$errors->get('permit_no')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="land_area" :value="__('Land Area')" />
                                        <x-text-input style="width: 98%;" id="land_area" name="land_area" type="text" class="mt-1" id="default_size" :value="old('land_area')" required autofocus autocomplete="land_area" />
                                        <x-input-error class="mt-1" :messages="$errors->get('land_area')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="country_id" :value="__('Countries')" />
                                        <select style="width: 98%;" id="country_id" name="country_id" class="mt-1 text-sm font-arial p-2 block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" selected>Select an Option</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('country_id')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="sector_id" :value="__('Sectors')" />
                                        <select style="width: 98%;" name="sector_id" id="sector_id" class="mt-1 text-sm font-arial p-2 block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" selected>Select an Option</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('sector_id')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="geolocation" :value="__('Geolocation')" />
                                        <x-text-input style="width: 98%;" id="geolocation" name="geolocation" type="text" class="mt-1" id="default_size" :value="old('geolocation')" required autofocus autocomplete="geolocation" />
                                        <x-input-error class="mt-1" :messages="$errors->get('geolocation')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="type" :value="__('Investment Type')" />
                                        <select style="width: 98%;" name="type" id="type" class="mt-1 text-sm font-arial p-2 block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option selected value="0">Local</option>
                                            <option value="1">Foreign</option>
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('type')" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mt-5">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    <a href="{{route('userdata.index')}}" class="inline-flex items-center px-3 py-2 font-medium focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-red-600 hover:bg-red-700 focus:ring-red-800 font-arial text-white">Back</a>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
