<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/investorlocation.js')
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
                                        <x-input-label for="contact_information" :value="__('Contact')" />
                                        <x-text-input id="contact_information" name="contact_information" type="text" class="mt-1" id="default_size" :value="old('contact_information', $profile?->contact_information)" required autofocus autocomplete="contact_information" />
                                        <x-input-error class="mt-1" :messages="$errors->get('contact_information')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="geolocation" :value="__('Geolocation')" />
                                        <x-text-input id="geolocation" name="geolocation" type="text" class="mt-1" id="default_size" :value="old('geolocation', $profile?->geolocation)" required autofocus autocomplete="geolocation" />
                                        <x-input-error class="mt-1" :messages="$errors->get('geolocation')" />
                                    </div>
                                </div>
                                <div class="flex flex-col mt-2 space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="businesstype_detail" :value="__('Business Detail')" />
                                        <x-text-input id="businesstype_detail" name="businesstype_detail" type="text" class="mt-1" id="default_size" :value="old('businesstype_detail', $profile?->businesstype_detail)" required autofocus autocomplete="businesstype_detail" />
                                        <x-input-error class="mt-1" :messages="$errors->get('businesstype_detail')" />
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
                                        <x-input-label for="region_id" :value="__('Region')" />
                                        <select id="region_id" name="region_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->region_id) selected @endif>Select an Option</option>
                                            @foreach ($regions as $region)
                                                <option value="{{$region->id}}" @if ($profile->region_id == $region->id) selected @endif>{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('region_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="district_id" :value="__('District')" />
                                        <select id="district_id" name="district_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->district_id) selected @endif>Select an Option</option>
                                            @foreach ($districts as $district)
                                                <option value="{{$district->id}}" @if ($profile->district_id == $district->id) selected @endif>{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('district_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-input-label for="township_id" :value="__('Township')" />
                                        <select id="township_id" name="township_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->township_id) selected @endif>Select an Option</option>
                                            @foreach ($townships as $township)
                                                <option value="{{$township->id}}" @if ($profile->township_id == $township->id) selected @endif>{{$township->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('township_id')" />
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
