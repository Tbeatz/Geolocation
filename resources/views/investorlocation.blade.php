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
                                {{ __('COMPANY INFORMATION') }}
                            </h2>
                            <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __("Fill your informations") }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500 font-arial">
                                {{session('message')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('geolocation.update') }}" class="p-4 sm:p-8 bg-green-600 shadow sm:rounded-lg border-2 border-gray-300" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div>
                                <h2 class="text-lg font-semibold text-gray-100 uppercase dark:text-green-400 mb-1">
                                    {{ __('Company Profile') }}
                                </h2>
                                <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-300">
                                    {{ __("Fill up your data correctly.") }}
                                </p>
                            </div>
                            <div class="m-auto w-3/4">
                                <x-input-label for="cover" :value="__('Cover Preview')" />
                                <img class="w40 h-40 rounded-lg ring-1 ring-green-600 dark:ring-green-600 mt-2" src="{{"/storage/$profile->cover"}}" alt="">
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="cover" :value="__('Cover')" />
                                        <input id="cover" style="width:99%;" name="cover" type="file" class="block mb-3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 font-arial focus:outline-none dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 mt-1" id="default_size" :value="old('cover', $profiles->cover)" autofocus autocomplete="cover" />
                                        <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="country_id" :value="__('Country')" />
                                        <select style="width: 98%;" id="country_id" name="country_id" class="mt-1 font-arial border border-gray-300 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-500" required>
                                            <option value="" @if (!$profile->country_id) selected @endif>Select an Option</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}" @if ($profile->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="type" :value="__('Investment Type')" />
                                        <select style="width: 98%;" name="type" id="type" class="mt-1 font-arial border border-gray-300 text-gray-200 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-200 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-200" required>
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
                                        <select style="width: 98%;" id="sector_id" name="sector_id" class="mt-1 font-arial border border-gray-300 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-500" required>
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
