<x-guest-layout>
    <div class="min-h-screen bg-gray-900 py-6 flex justify-center sm:py-20" style="background-image: url('img/login.jpg'); background-size: cover;">
        <div class="relative px-4 py-10 bg-gray-600 shadow-lg sm:rounded-l-3xl sm:p-10 animated-border border-r-0 border-y-2 border-l-2">
            <img class="w-50 h-40 rounded-lg" src="{{asset('img/map.png')}}" alt="">
            <h3 class="text-white text-lg font-arial text-center">Geolocation</h3>
        </div>
        <div class="relative px-4 py-10 bg-gray-100 shadow-lg sm:rounded-r-3xl sm:p-10 animated-border border-l-0 border-y-2 border-r-2">
            <a href="/">
                <h3 class="text-gray-700 text-lg font-arial hover:text-gray-600">Registration Form</h3>
            </a>
            <form method="POST" action="{{ route('register') }}" class="mt-3">
                @csrf
                <!-- Name -->
                <div class="mb-4 sm:flex">
                    <div class="mr-1">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                            autocomplete="name" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-1 sm:mt-0 sm:ml-2" />

                    <!-- Email Address -->
                    <div class="mt-4 sm:mt-0 sm:ml-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required
                            autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 sm:ml-2" />
                </div>

                {{-- Company Informations --}}
                <div class="mb-4 sm:flex">
                    <div class="mr-1">
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <x-text-input id="company_name" type="text" name="company_name" :value="old('company_name')" required
                            autocomplete="company" />
                    </div>
                    <x-input-error :messages="$errors->get('company_name')" class="mt-1 sm:mt-0 sm:ml-2" />

                    <div class="mt-4 sm:mt-0 sm:ml-2">
                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                        <x-text-input id="company_reg_no" type="text" name="company_reg_no" :value="old('company_reg_no')"
                            required autocomplete="company" />
                    </div>
                    <x-input-error :messages="$errors->get('company_reg_no')" class="mt-1 sm:ml-2" />
                </div>

                <div class="mb-4 sm:flex">
                    <div class="mr-1">
                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                        <x-text-input id="permit_no" type="text" name="permit_no" :value="old('permit_no')" required
                            autocomplete="company" />
                    </div>
                    <x-input-error :messages="$errors->get('permit_no')" class="mt-1 sm:mt-0 sm:ml-2" />

                    <div class="mt-4 sm:mt-0 sm:ml-2 md:w-1/2">
                        <x-input-label for="permit_date" :value="__('Permit Date')" />
                        <x-text-input id="permit_date" type="date" name="permit_date" :value="old('permit_date')" required
                            autocomplete="company" />
                    </div>
                    <x-input-error :messages="$errors->get('permit_date')" class="mt-1 sm:ml-2" />
                </div>

                <!-- Password -->
                <div class="mb-4 sm:flex">
                    <div class="mr-1">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 sm:mt-0 sm:ml-2" />

                    <div class="mt-4 sm:mt-0 sm:ml-2">
                        <!-- Confirm Password -->
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                            required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 sm:ml-2" />
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center mt-4">
                    <a class="underline text-sm text-gray-700 hover:text-blue-600 dark:hover:text-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <div class="mt-4 sm:mt-0">
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</x-guest-layout>
