<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div>
            @vite('resources/js/user/detail/detail.js')
        </div>
        @if (session('message'))
            <div id="detail-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-arial">
                    {{session('message')}}
                </div>
                <button type="button" id="detail-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" data-dismiss-target="#detail-msg" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-semibold font-arial text-gray-700 mb-1">
                            {{ __('Company Detail') }}
                        </h2>
                        <p class="mb-4 font-arial font-semibold text-sm text-greenprimary">
                            {{ __("Fill your detail informations") }}
                        </p>
                    </header>
                    <form method="post" action="{{ route('detail.update') }}">
                        @csrf
                        @method('patch')
                        <div class="max-w-full mx-auto">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="environment_plan" :value="__('Plan for no harm to environment (IEE/EMP/EIA)')" />
                                        <select id="environment_plan" name="environment_plan" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->environment_plan == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->environment_plan == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('environment_plan')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2 hidden enplan_date">
                                    <x-input-label for="environment_plan_date" :value="__('Last date for Environment No Harm plan')" />
                                    <x-text-input id="environment_plan_date" name="environment_plan_date" type="date" class="w-full" :value="old('environment_plan_date', $profile?->environment_plan_date)" required autofocus autocomplete="environment_plan_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('environment_plan_date')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="industry_reg" :value="__('Industry Registered')" />
                                        <select id="industry_reg" name="industry_reg" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->industry_reg == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->industry_reg == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('industry_reg')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2 hidden ind_reg_no">
                                    <x-input-label for="industry_reg_no" :value="__('Industry Registration No.')" />
                                    <x-text-input id="industry_reg_no" name="industry_reg_no" type="text" class="w-full" :value="old('industry_reg_no', $profile?->industry_reg_no)" required autofocus autocomplete="industry_reg_no" />
                                    <x-input-error class="mt-2" :messages="$errors->get('industry_reg_no')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2 hidden ind_reg_date">
                                    <x-input-label for="industry_reg_date" :value="__('Industry Registration Date')" />
                                    <x-text-input id="industry_reg_date" name="industry_reg_date" type="date" class="w-full" :value="old('industry_reg_date', $profile?->industry_reg_date)" required autofocus autocomplete="industry_reg_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('industry_reg_date')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="construct_BBC" :value="__('Construction Permit with BBC')" />
                                        <select id="construct_BBC" name="construct_BBC" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->construct_BBC == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->construct_BBC == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('construct_BBC')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="fire_insurance" :value="__('Fire Insurance')" />
                                        <select id="fire_insurance" name="fire_insurance" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->fire_insurance == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->fire_insurance == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('fire_insurance')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2 hidden fire_ins">
                                    <x-input-label for="fire_insurance_com" :value="__('Fire Insurance CompanyName')" />
                                    <x-text-input id="fire_insurance_com" name="fire_insurance_com" type="text" class="mt-1" :value="old('fire_insurance_com', $profile?->fire_insurance_com)" required autofocus autocomplete="fire_insurance_com" />
                                    <x-input-error class="mt-1" :messages="$errors->get('fire_insurance_com')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="municipal_business_license" :value="__('Municipal Business License')" />
                                        <select id="municipal_business_license" name="municipal_business_license" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->municipal_business_license == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->municipal_business_license == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('municipal_business_license')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="export_import_license" :value="__('Export/Import License')" />
                                        <select id="export_import_license" name="export_import_license" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->export_import_license == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->export_import_license == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('export_import_license')" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mt-2">
                                    <x-input-label for="fire_recommendation" :value="__('Fire-station Recommendation')" />
                                        <select id="fire_recommendation" name="fire_recommendation" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                            <option value="0"  @if ($profile->fire_recommendation == 0) selected @endif>No</option>
                                            <option value="1"  @if ($profile->fire_recommendation == 1) selected @endif>Yes</option>
                                        </select>
                                    <x-input-error class="mt-1" :messages="$errors->get('fire_recommendation')" />
                                </div>
                            </div>
                            @if($profile->commercial_date)
                                <p class=" mt-4 font-arial font-semibold text-sm text-greenprimary">
                                    {{ __("Since you already have a commercial date, you can start filling those under informations.") }}
                                </p>
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="commercial_last_date" :value="__('Last Commercial Date for record')" />
                                        <x-text-input id="commercial_last_date" name="commercial_last_date" type="date" class="w-full" :value="old('commercial_last_date', $profile?->commercial_last_date)" required autofocus autocomplete="commercial_last_date" />
                                        <x-input-error class="mt-2" :messages="$errors->get('commercial_last_date')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="export_price" :value="__('Export Price')" />
                                        <x-text-input id="export_price" name="export_price" type="text" class="w-full" :value="old('export_price', $profile?->export_price)" required autofocus autocomplete="export_price" />
                                        <x-input-error class="mt-2" :messages="$errors->get('export_price')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="import_price" :value="__('Import Price')" />
                                        <x-text-input id="import_price" name="import_price" type="text" class="w-full" :value="old('import_price', $profile?->import_price)" required autofocus autocomplete="import_price" />
                                        <x-input-error class="mt-2" :messages="$errors->get('import_price')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="currency_id" :value="__('Currency Type')" />
                                            <select id="currency_id" name="currency_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                                <option value="">Select Currency</option>
                                                @foreach ($currencies as $currency)
                                                    <option value="{{$currency->id}}" @if($profile->currency_id == $currency->id) selected @endif>{{$currency->name}}</option>
                                                @endforeach
                                            </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('currency_id')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="business_system_type" :value="__('Business System Type')" />
                                            <select id="business_system_type" name="business_system_type" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                                <option value="0"  @if ($profile->business_system_type == 0) selected @endif>Directly</option>
                                                <option value="1"  @if ($profile->business_system_type == 1) selected @endif>Intermediate</option>
                                            </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('business_system_type')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="export_type" :value="__('Export Type')" />
                                        <x-text-input id="export_type" name="export_type" type="text" class="w-full" :value="old('export_type', $profile?->export_type)" required autofocus autocomplete="export_type" />
                                        <x-input-error class="mt-2" :messages="$errors->get('export_type')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="received_letter_brandname" :value="__('Received Brand Name')" />
                                        <x-text-input id="received_letter_brandname" name="received_letter_brandname" type="text" class="w-full" :value="old('received_letter_brandname', $profile?->received_letter_brandname)" required autofocus autocomplete="received_letter_brandname" />
                                        <x-input-error class="mt-2" :messages="$errors->get('received_letter_brandname')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="commercial_company_name" :value="__('Company Name')" />
                                        <x-text-input id="commercial_company_name" name="commercial_company_name" type="text" class="w-full" :value="old('commercial_company_name', $profile?->commercial_company_name)" required autofocus autocomplete="commercial_company_name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('commercial_company_name')" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-2">
                                        <x-input-label for="commercial_country_id" :value="__('Country Name')" />
                                            <select id="commercial_country_id" name="commercial_country_id" class="w-full text-sm mt-1 p-2 block font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                                                <option value="">Select your Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}" @if($profile->commercial_country_id == $country->id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        <x-input-error class="mt-1" :messages="$errors->get('commercial_country_id')" />
                                    </div>
                                </div>
                            @endif
                            <p class=" mt-5 font-arial font-semibold text-sm text-greenprimary">
                                {{ __("Local/Foreign Appointed Labours") }}
                            </p>
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-full px-2 mt-2">
                                    <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                        Local Appointed Labours
                                    </h4>
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="local_labour_male" :value="__('Male')" />
                                    <x-text-input name="local_labour_male" type="text" id="local_labour_male" class="w-full" :value="old('name', $profile?->local_labour_male)" required autofocus autocomplete="local_labour_male" />
                                    <x-input-error class="mt-2" :messages="$errors->get('local_labour_male')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="local_labour_female" :value="__('Female')" />
                                    <x-text-input name="local_labour_female" type="text" id="local_labour_female" class="w-full" :value="old('local_labour_female', $profile?->local_labour_female)" required autofocus autocomplete="local_labour_female" />
                                    <x-input-error class="mt-2" :messages="$errors->get('local_labour_female')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="local_labour_total" :value="__('Total')" />
                                    <x-text-input type="text" id="local_labour_total" class="w-full bg-gray-300" :value="old('local_labour_total', $profile?->local_labour_female + $profile?->local_labour_male)" disabled autofocus autocomplete="local_labour_total" />
                                    <x-input-error class="mt-2" :messages="$errors->get('local_labour_total')" />
                                </div>
                                <div class="w-full md:w-full px-2 mt-5">
                                    <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                        Foreign Director Appointed Labours
                                    </h4>
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_director_male" :value="__('Male')" />
                                    <x-text-input name="foreign_director_male" type="text" id="foreign_director_male" class="w-full" :value="old('name', $profile?->foreign_director_male)" required autofocus autocomplete="foreign_director_male" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_director_male')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_director_female" :value="__('Female')" />
                                    <x-text-input name="foreign_director_female" type="text" id="foreign_director_female" class="w-full" :value="old('foreign_director_female', $profile?->foreign_director_female)" required autofocus autocomplete="foreign_director_female" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_director_female')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_director_total" :value="__('Total')" />
                                    <x-text-input type="text" id="foreign_director_total" class="w-full bg-gray-300" :value="old('foreign_director_total', $profile?->foreign_director_female + $profile?->foreign_director_male)" disabled autofocus autocomplete="foreign_director_total" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_director_total')" />
                                </div>
                                <div class="w-full md:w-full px-2 mt-5">
                                    <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                        Foreign Technician Appointed Labours
                                    </h4>
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_technician_male" :value="__('Male')" />
                                    <x-text-input name="foreign_technician_male" type="text" id="foreign_technician_male" class="w-full" :value="old('name', $profile?->foreign_technician_male)" required autofocus autocomplete="foreign_technician_male" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_technician_male')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_technician_female" :value="__('Female')" />
                                    <x-text-input name="foreign_technician_female" type="text" id="foreign_technician_female" class="w-full" :value="old('foreign_technician_female', $profile?->foreign_technician_female)" required autofocus autocomplete="foreign_technician_female" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_technician_female')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_technician_total" :value="__('Total')" />
                                    <x-text-input type="text" id="foreign_technician_total" class="w-full bg-gray-300" :value="old('foreign_technician_total', $profile?->foreign_technician_female + $profile?->foreign_technician_male)" disabled autofocus autocomplete="foreign_technician_total" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_technician_total')" />
                                </div>
                                <div class="w-full md:w-full px-2 mt-5">
                                    <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                        Foreign Dependent Appointed Labours
                                    </h4>
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_dependent_male" :value="__('Male')" />
                                    <x-text-input name="foreign_dependent_male" type="text" id="foreign_dependent_male" class="w-full" :value="old('name', $profile?->foreign_dependent_male)" required autofocus autocomplete="foreign_dependent_male" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_dependent_male')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_dependent_female" :value="__('Female')" />
                                    <x-text-input name="foreign_dependent_female" type="text" id="foreign_dependent_female" class="w-full" :value="old('foreign_dependent_female', $profile?->foreign_dependent_female)" required autofocus autocomplete="foreign_dependent_female" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_dependent_female')" />
                                </div>
                                <div class="w-full md:w-1/3 px-2 mt-1">
                                    <x-input-label for="foreign_dependent_total" :value="__('Total')" />
                                    <x-text-input type="text" id="foreign_dependent_total" class="w-full bg-gray-300" :value="old('foreign_dependent_total', $profile?->foreign_dependent_female + $profile?->foreign_dependent_male)" disabled autofocus autocomplete="foreign_dependent_total" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foreign_dependent_total')" />
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-4">
        <div id="labour-del-msg" class="flex p-4 rounded-lg bg-green-50 text-green-800" style="display: none;" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-arial labour_del_alert">
            </div>
            <button type="button" id="labour-del-close" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 bg-green-50 text-green-500 hover:bg-green-200" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
</x-app-layout>
