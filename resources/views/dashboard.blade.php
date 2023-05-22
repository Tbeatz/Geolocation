<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold font-arial text-gray-700 uppercase dark:text-dark-100 mb-1">
                                {{ __('COMPANY INFORMATION') }}
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
                        <form method="post" action="{{ route('dashboard.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="m-auto w-full">
                                <div class="flex flex-row">
                                    <div class="w-full">
                                        <x-input-label for="company_name" :value="__('Company Name')" />
                                        <x-text-input style="width: 97%;" id="company_name" name="company_name" type="text" id="default_size" :value="old('company_name', $profile?->company_name)" required autofocus autocomplete="company_name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                        <x-text-input style="width: 97%;" id="company_reg_no" name="company_reg_no" type="text" class="mt-1" id="default_size" :value="old('company_reg_no', $profile?->company_reg_no)" required autofocus autocomplete="company_reg_no" />
                                        <x-input-error class="mt-2" :messages="$errors->get('company_reg_no')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="company_reg_date" :value="__('Company Registration Date')" />
                                        <x-text-input style="width: 97%;" id="company_reg_date" name="company_reg_date" type="date" class="mt-1" id="default_size" :value="old('company_reg_date', $profile?->company_reg_date)" required autofocus autocomplete="company_reg_date" />
                                        <x-input-error class="mt-2" :messages="$errors->get('company_reg_date')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="commercial_date" :value="__('Commercial Date')" />
                                        <x-text-input style="width: 98%;" id="commercial_date" name="commercial_date" type="date" class="mt-1" id="default_size" :value="old('commercial_date', $profile?->commercial_date)" required autofocus autocomplete="commercial_date" />
                                        <x-input-error class="mt-2" :messages="$errors->get('commercial_date')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="office_address" :value="__('Office Address')" />
                                        <x-text-input style="width: 98%;" id="office_address" name="office_address" type="text" class="mt-1" id="default_size" :value="old('office_address', $profile?->office_address)" required autofocus autocomplete="office_address" />
                                        <x-input-error class="mt-2" :messages="$errors->get('office_address')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                                        <x-text-input style="width: 98%;" id="permit_no" name="permit_no" type="text" class="mt-1" id="default_size" :value="old('permit_no', $profile?->permit_no)" required autofocus autocomplete="permit_no" />
                                        <x-input-error class="mt-2" :messages="$errors->get('permit_no')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="permit_date" :value="__('Permit Date')" />
                                        <x-text-input style="width: 98%;" id="permit_date" name="permit_date" type="date" class="mt-1" id="default_size" :value="old('permit_date', $profile?->permit_date)" required autofocus autocomplete="permit_date" />
                                        <x-input-error class="mt-2" :messages="$errors->get('permit_date')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="permit_type_id" :value="__('Permit Type')" />
                                        <select style="width: 98%;" id="permit_type_id" name="permit_type_id" class="mt-1 p-2 block w-full font-arial dark:border-gray-300 dark:bg-white dark:text-gray-900 dark:focus:border-green-600 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile?->permit_type_id) selected @endif>Select an Option</option>
                                            @foreach ($permit_types as $permit_type)
                                                <option value="{{$permit_type?->id}}" @if ($profile?->permit_type_id == $permit_type?->id) selected @endif>{{$permit_type?->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('permit_type_id')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="form_of_invest_id" :value="__('Form Of Investment')" />
                                        <select style="width: 98%;" name="form_of_invest_id" id="form_of_invest_id" class="mt-1 p-2 block w-full font-arial dark:border-gray-300 dark:bg-white dark:text-gray-900 dark:focus:border-green-600 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="" @if (!$profile?->form_of_invest_id) selected @endif>Select an Option</option>
                                            @foreach ($form_of_invests as $form_of_invest)
                                                <option value="{{$form_of_invest?->id}}" @if ($profile?->form_of_invest_id == $form_of_invest?->id) selected @endif>{{$form_of_invest->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('form_of_invest_id')" />
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="local_invest" :value="__('Local Investment')" />
                                        <x-text-input style="width: 98%;" id="local_invest" name="local_invest" type="text" class="mt-1" id="default_size" :value="old('local_invest', $profile?->local_invest)" required autofocus autocomplete="local_invest" />
                                        <x-input-error class="mt-2" :messages="$errors->get('local_invest')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="foreign_invest" :value="__('Foreign Investment')" />
                                        <x-text-input style="width: 98%;" id="foreign_invest" name="foreign_invest" type="text" class="mt-1" id="default_size" :value="old('foreign_invest', $profile?->foreign_invest)" required autofocus autocomplete="foreign_invest" />
                                        <x-input-error class="mt-2" :messages="$errors->get('foreign_invest')" />
                                    </div>
                                </div>
                                {{-- <div class="flex flex-row mt-2">
                                    <div class="w-full">
                                        <x-input-label for="map_icon" :value="__('Map Icon')" />
                                        <input style="width: 99%; font-family:arial;" id="map_icon" name="map_icon" type="file" class="block mb-5 text-sm text-gray-200 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 focus:outline-none dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 mt-1" id="default_size" :value="old('map_icon', $user->map_icon)" required autofocus autocomplete="map_icon" />
                                        <x-input-error class="mt-2" :messages="$errors->get('form_of_invest_id')" />
                                    </div>
                                </div> --}}
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
