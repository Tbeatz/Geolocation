<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <table>
            <tr>
                <td>
                    <div class="mr-1">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('name')" class="mb-2" />

                <!-- Email Address -->
                <td>
                    <div class="ml-1">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('email')" class="mb-2" />
            </tr>


            {{-- Company Informations --}}
            <tr>
                <td>
                    <div class="mt-4 mr-1">
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <x-text-input id="company_name" type="text" name="company_name"
                            :value="old('company_name')" required autocomplete="company" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('company_name')" class="mb-2" />
                <td>
                    <div class="mt-4 ml-1">
                        <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                        <x-text-input id="company_reg_no" type="text" name="company_reg_no"
                            :value="old('company_reg_no')" required autocomplete="company" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('company_reg_no')" class="mb-2" />
            </tr>
            <tr>
                <td>
                    <div class="mt-4 mr-1">
                        <x-input-label for="permit_no" :value="__('Permit No.')" />
                        <x-text-input id="permit_no" type="text" name="permit_no"
                            :value="old('permit_no')" required autocomplete="company" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('permit_no')" class="mb-2" />
                <td>
                    <div class="mt-4 ml-1">
                        <x-input-label for="permit_date" :value="__('Permit Date')" />
                        <x-text-input id="permit_date" type="date" name="permit_date"
                            :value="old('permit_date')" required autocomplete="company" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('permit_date')" class="mb-2" />
            </tr>

            <!-- Password -->
            <tr>
                <td>
                    <div class="mt-4 mr-1">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('password')" class="mb-2" />
                <td>
                    <div class="mt-4 ml-1">
                        <!-- Confirm Password -->
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </td>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mb-2" />
            </tr>
            <tr>
                <td>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-900 hover:text-blue-600 dark:hover:text-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </td>
                <td>
                    <div class="mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</x-guest-layout>
