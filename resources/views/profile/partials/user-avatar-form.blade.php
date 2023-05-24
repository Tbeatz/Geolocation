<section>
    <header>
        <h2 class="text-lg font-semibold font-arial text-gray-700 dark:text-dark-100 mb-1">
            {{ __('Avatar') }}
        </h2>
        <p class="mb-4 font-semibold font-arial text-sm text-green-600 dark:text-green-600">
            {{ __("Create or Update") }}
        </p>
        @if ($user->avatar)
            <img class="w-20 h-20 rounded-full ring-1 ring-green-600 dark:ring-green-600" src="{{"/storage/$user->avatar"}}" alt="">
        @elseif (!$user->avatar)
            <img class="w-20 h-20 rounded-full ring-1 ring-green-600 dark:ring-green-600" src="img/user.png" alt="">
        @endif
    </header>
    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf
        @method('patch')
        <div>
            <label for="avatar" class="text-gray-600 text-sm font-arial">Photo</label>
            <input id="avatar" name="avatar" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 focus:outline-none dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 mt-1 font-arial" id="default_size" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-1" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center text-sm px-3 py-2 font-arial font-arial bg-green-500 text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
        </div>
    </form>
</section>
