<x-app-layout>
    <x-slot name="header">
        <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-dark-900 dark:text-dark-100 mb-1">
                                {{ __('COMPANY PROFILE') }}
                            </h2>
                            <p style="color:#3b82f6; font-family: arial;" class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Fill your informations") }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500">
                                {{session('message')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('dashboard.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div>
                                <x-input-label for="company_name" :value="__('Company Name')" />
                                <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" id="default_size" :value="old('company_name', $profile?->company_name)" required autofocus autocomplete="company_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                            </div>
                            <div>
                                <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                                <x-text-input id="company_reg_no" name="company_reg_no" type="text" class="mt-1 block w-full" id="default_size" :value="old('company_reg_no', $profile?->company_reg_no)" required autofocus autocomplete="company_reg_no" />
                                <x-input-error class="mt-2" :messages="$errors->get('company_reg_no')" />
                            </div>
                            <div>
                                <x-input-label for="company_reg_date" :value="__('Company Registration Date')" />
                                <x-text-input id="company_reg_date" name="company_reg_date" type="date" class="mt-1 block w-full" id="default_size" :value="old('company_reg_date', $profile?->company_reg_date)" required autofocus autocomplete="company_reg_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('company_reg_date')" />
                            </div>
                            <div>
                                <x-input-label for="commercial_date" :value="__('Commercial Date')" />
                                <x-text-input id="commercial_date" name="commercial_date" type="date" class="mt-1 block w-full" id="default_size" :value="old('commercial_date', $profile?->commercial_date)" required autofocus autocomplete="commercial_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('commercial_date')" />
                            </div>
                            <div>
                                <x-input-label for="office_address" :value="__('Office Address')" />
                                <x-text-input id="office_address" name="office_address" type="text" class="mt-1 block w-full" id="default_size" :value="old('office_address', $profile?->office_address)" required autofocus autocomplete="office_address" />
                                <x-input-error class="mt-2" :messages="$errors->get('office_address')" />
                            </div>
                            <div>
                                <x-input-label for="permit_no" :value="__('Permit No.')" />
                                <x-text-input id="permit_no" name="permit_no" type="text" class="mt-1 block w-full" id="default_size" :value="old('permit_no', $profile?->permit_no)" required autofocus autocomplete="permit_no" />
                                <x-input-error class="mt-2" :messages="$errors->get('permit_no')" />
                            </div>
                            <div>
                                <x-input-label for="permit_date" :value="__('Permit Date')" />
                                <x-text-input id="permit_date" name="permit_date" type="date" class="mt-1 block w-full" id="default_size" :value="old('permit_date', $profile?->permit_date)" required autofocus autocomplete="permit_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('permit_date')" />
                            </div>
                            <div>
                                <x-input-label for="local_invest" :value="__('Local Investment')" />
                                <x-text-input id="local_invest" name="local_invest" type="text" class="mt-1 block w-full" id="default_size" :value="old('local_invest', $profile?->local_invest)" required autofocus autocomplete="local_invest" />
                                <x-input-error class="mt-2" :messages="$errors->get('local_invest')" />
                            </div>
                            <div>
                                <x-input-label for="foreign_invest" :value="__('Foreign Investment')" />
                                <x-text-input id="foreign_invest" name="foreign_invest" type="text" class="mt-1 block w-full" id="default_size" :value="old('foreign_invest', $profile?->foreign_invest)" required autofocus autocomplete="foreign_invest" />
                                <x-input-error class="mt-2" :messages="$errors->get('foreign_invest')" />
                            </div>
                            <div>
                                <x-input-label for="permit_type_id" :value="__('Permit Type')" />
                                <x-text-input id="permit_type_id" name="permit_type_id" type="text" class="mt-1 block w-full" id="default_size" :value="old('permit_type_id', $profile?->permit_type_id)" required autofocus autocomplete="permit_type_id" />
                                <x-input-error class="mt-2" :messages="$errors->get('permit_type_id')" />
                            </div>
                            <div>
                                <x-input-label for="form_of_invest_id" :value="__('Form Of Investment')" />
                                <x-text-input id="form_of_invest_id" name="form_of_invest_id" type="text" class="mt-1 block w-full" id="default_size" :value="old('form_of_invest_id', $profile?->form_of_invest_id)" required autofocus autocomplete="form_of_invest_id" />
                                <x-input-error class="mt-2" :messages="$errors->get('form_of_invest_id')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
