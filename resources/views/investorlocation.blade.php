<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/investorlocation.js')
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-arial font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
                                {{ __('Geolocation') }}
                            </h2>
                            <p class="mb-4 font-arial font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __("Fill your informations") }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500 font-arial">
                                {{session('message')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('geolocation.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="m-auto w-full">
                                <x-input-label for="cover" :value="__('Preview')" />
                                @if ($profile->cover)
                                    <div class="w-40 h-40 rounded-lg shadow-lg mt-3">
                                        <img class="w-40 h-40 preview_cover" src="{{"/storage/$profile->cover"}}" alt="">
                                    </div>
                                @else
                                    <div class="w-40 h-40 rounded-lg shadow-lg mt-3">
                                        <img class="w-40 h-40 preview_cover opacity-0" alt="">
                                    </div>
                                @endif
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="cover" :value="__('Cover')" />
                                        <input id="cover" style="width:99%;" name="cover" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 focus:outline-none dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 mt-1 font-arial" id="default_size" :value="old('cover', $profiles->cover)" autofocus autocomplete="cover" />
                                        <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="country_id" :value="__('Country')" />
                                        <select style="width: 98%;" id="country_id" name="country_id" class="mt-1 p-2 block w-full font-arial dark:border-gray-300 dark:bg-white dark:text-gray-900 dark:focus:border-green-600 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->country_id) selected @endif>Select an Option</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" @if ($profile->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="type" :value="__('Investment Type')" />
                                        <select style="width: 98%;" name="type" id="type" class="mt-1 p-2 block w-full font-arial dark:border-gray-300 dark:bg-white dark:text-gray-900 dark:focus:border-green-600 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option selected value="0">Local</option>
                                            <option value="1">Foreign</option>
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="contact_information" :value="__('Contact')" />
                                        <x-text-input style="width: 98%;" id="contact_information" name="contact_information" type="text" class="mt-1" id="default_size" :value="old('contact_information', $profile?->contact_information)" required autofocus autocomplete="contact_information" />
                                        <x-input-error class="mt-2" :messages="$errors->get('contact_information')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="geolocation" :value="__('Geolocation')" />
                                        <x-text-input style="width: 98%;" id="geolocation" name="geolocation" type="text" class="mt-1" id="default_size" :value="old('geolocation', $profile?->geolocation)" required autofocus autocomplete="geolocation" />
                                        <x-input-error class="mt-2" :messages="$errors->get('geolocation')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="businesstype_detail" :value="__('Business Detail')" />
                                        <x-text-input style="width: 98%;" id="businesstype_detail" name="businesstype_detail" type="text" class="mt-1" id="default_size" :value="old('businesstype_detail', $profile?->businesstype_detail)" required autofocus autocomplete="businesstype_detail" />
                                        <x-input-error class="mt-2" :messages="$errors->get('businesstype_detail')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="sector_id" :value="__('Sector')" />
                                        <select style="width: 98%;" id="sector_id" name="sector_id" class="mt-1 p-2 block w-full font-arial dark:border-gray-300 dark:bg-white dark:text-gray-900 dark:focus:border-green-600 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile->sector_id) selected @endif>Select an Option</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}" @if ($profile->sector_id == $sector->id) selected @endif>{{$sector->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 mt-5">
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
