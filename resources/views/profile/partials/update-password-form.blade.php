<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
            {{ __('Update Password') }}
        </h2>

        <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="text-green-600 font-bold text-sm">Current Password</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm bg-gray-200 border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-700 dark:border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-lock" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                </span>
                <input type="password" id="current_password" name="current_password" class="mt-1 block w-full dark:border-gray-200 dark:bg-green-600 dark:text-gray-200 dark:focus:border-lime-400 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required autofocus autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="text-green-600 font-bold text-sm">New Password</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm bg-gray-200 border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-700 dark:border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                      </svg>
                </span>
                <input type="password" id="password" name="password" class="mt-1 block w-full dark:border-gray-200 dark:bg-green-600 dark:text-gray-200 dark:focus:border-lime-400 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required autofocus autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="text-green-600 font-bold text-sm">Confirm Password</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm bg-gray-200 border border-gray-300 rounded-md dark:bg-gray-900 dark:text-gray-700 dark:border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                      </svg>
                </span>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full dark:border-gray-200 dark:bg-green-600 dark:text-gray-200 dark:focus:border-lime-400 focus:ring-lime-300 dark:focus:ring-lime-600 rounded-md shadow-sm" required autofocus autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 font-medium bg-green-500 uppercase text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
