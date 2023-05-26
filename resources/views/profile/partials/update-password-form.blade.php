<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-700 mb-1 font-arial">
            {{ __('Update Password') }}
        </h2>

        <p class="mb-4 font-semibold text-sm text-greenprimary font-arial">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="text-gray-600 font-arial text-sm">Current Password</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm border rounded-md bg-gray-900 text-gray-700 border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-lock" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                </span>
                <input type="password" id="current_password" name="current_password" class="mt-1 text-sm block w-full border-gray-300 bg-white text-gray-700 focus:border-green-400 focus:ring-lime-600 rounded-md shadow-sm font-arial" required autofocus autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
        </div>

        <div>
            <label for="password" class="text-gray-600 text-sm font-arial">New Password</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm border rounded-md bg-gray-900 text-gray-700 border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                      </svg>
                </span>
                <input type="password" id="password" name="password" class="mt-1 block w-full text-sm border-gray-300 font-arial bg-white text-gray-700 focus:border-green-400 focus:ring-lime-600 rounded-md shadow-sm" required autofocus autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
        </div>

        <div>
            <label for="password_confirmation" class="text-gray-600 text-sm font-arial">Confirm Password</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm border rounded-md bg-gray-900 text-gray-700 border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                      </svg>
                </span>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 text-sm block w-full border-gray-300 font-arial bg-white text-gray-700 focus:border-green-400 focus:ring-lime-600 rounded-md shadow-sm" required autofocus autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center mt-3 px-3 py-2 focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-greenprimary hover:bg-green-700 focus:ring-green-800 font-arial text-white">Save</button>
        </div>
    </form>
</section>
