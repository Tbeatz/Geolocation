<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-700 font-arial">
            {{ __('Profile Information') }}
        </h2>

        <p class="mb-4 font-semibold text-sm text-greenprimary font-arial">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <label for="name" class="text-gray  -600 font-arial text-sm">Name</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm border rounded-md bg-gray-900 text-gray-700 border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                </span>
                <input type="text" id="name" name="name" class="mt-1 block w-full text-sm font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" value="{{old('name', $user->name)}}" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-1" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="text-gray-600 text-sm font-arial">Email</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 mx-1 text-sm border rounded-md bg-gray-900 text-gray-700 border-gray-700 mt-1 block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                </span>
                <input type="text" id="email" name="email" class="mt-1 block w-full text-sm font-arial border-gray-300 bg-white text-gray-700 focus:border-green-400 focus:ring-lime-600 rounded-md shadow-sm" value="{{old('name', $user->email)}}" required autofocus  />
            </div>
            <x-input-error class="mt-1" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center text-white px-3 py-2 mt-3 font-arial focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-greenprimary hover:bg-green-700 focus:ring-green-800">Save</button>
        </div>
    </form>
</section>
