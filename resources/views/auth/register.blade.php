<x-guest-layout>
    <div class="min-h-screen bg-gray-900 py-6 flex justify-center sm:py-9"
        style="background-image: url('img/login.jpg'); background-size: cover;">
        <div
            class="relative px-4 py-10 bg-gray-900 shadow-lg sm:rounded-l-3xl sm:p-10 animated-border border-r-0 border-y-2 border-l-2">
            <img class="w-50 h-40 rounded-lg" src="{{ asset('img/map.png') }}" alt="">
            <h3 class="text-white text-lg font-arial text-center">Geolocation</h3>
        </div>
        <div
            class="relative px-4 py-10 bg-gray-100 shadow-lg sm:rounded-r-3xl sm:p-10 animated-border border-l-0 border-y-2 border-r-2">
            <a href="/">
                <h3 class="text-gray-700 text-lg font-arial hover:text-gray-600">Registration Form</h3>
            </a>
            <form method="POST" action="{{ route('register') }}" class="mt-3">
                @csrf
                <!-- Name -->
                <div class="mb-4 sm:flex">
                    <div class="mr-1 w-full sm:w-1/2">
                        <x-input-label for="name" :value="__('Name')" />
                        <div class="relative">
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4 sm:mt-0 sm:ml-2 w-full sm:w-1/2">
                        <x-input-label for="email" :value="__('Email')" />
                        <div class="relative">
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>
                    </div>
                </div>

                {{-- Company Informations --}}
                <div class="mb-4 sm:flex">
                    <div class="mr-1 w-full sm:w-1/2">
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <div class="relative">
                            <x-text-input id="company_name" type="text" name="company_name" :value="old('company_name')"
                                required autocomplete="company" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-2 w-full sm:w-1/2">
                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                        <div class="relative">
                            <x-text-input id="company_reg_no" type="text" name="company_reg_no" :value="old('company_reg_no')"
                                required autocomplete="company" />
                            <x-input-error :messages="$errors->get('company_reg_no')" class="mt-1" />
                        </div>
                    </div>
                </div>

                <div class="mb-4 sm:flex">
                    <div class="mr-1 w-full sm:w-1/2">
                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                        <div class="relative">
                            <x-text-input id="permit_no" type="text" name="permit_no" :value="old('permit_no')" required
                                autocomplete="company" />
                            <x-input-error :messages="$errors->get('permit_no')" class="mt-1" />
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-2 w-full sm:w-1/2">
                        <x-input-label for="permit_date" :value="__('Permit Date')" />
                        <div class="relative">
                            <x-text-input id="permit_date" type="date" name="permit_date" :value="old('permit_date')" required
                                autocomplete="company" />
                            <x-input-error :messages="$errors->get('permit_date')" class="mt-1" />
                        </div>
                    </div>
                </div>
                <div class="mb-4 sm:flex">
                    <div class="w-full">
                        <x-input-label for="permit_type_id" :value="__('Permit Type')" />
                        <select id="permit_type_id" name="permit_type_id"
                            class="mt-1 p-2 text-sm block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm"
                            required>
                            <option value="" selected>Select an Option
                            </option>
                            @foreach ($permit_types as $permit_type)
                                <option value="{{ $permit_type?->id }}">{{ $permit_type?->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('permit_type_id')" />
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4 sm:flex">
                    <div class="mr-1 w-full sm:w-1/2">
                        <x-input-label for="password" :value="__('Password')" />
                        <div class="relative">
                            <x-text-input id="password" type="password" name="password" required
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-2 w-full sm:w-1/2">
                        <!-- Confirm Password -->
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <div class="relative">
                            <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center mt-4">
                    <a class="underline text-sm text-gray-700 hover:text-blue-600 dark:hover:text-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <div class="mt-4 sm:mt-0">
                        <x-primary-button class="ml-0 sm:ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</x-guest-layout>
