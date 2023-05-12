<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
            {{ __('Avatar') }}
        </h2>
        <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
            {{ __("Create or Update") }}
        </p>
        <img class="w-20 h-20 rounded-full ring-1 ring-green-600 dark:ring-green-600" src="{{"/storage/$user->avatar"}}" alt="">
    </header>
    @if (session('message'))
        <div class="text-red-600 font-semibold">
            {{session('message')}}
        </div>
    @endif
    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf
        @method('patch')
        <div>
            <label for="avatar" class="text-green-600 font-bold text-sm">Avatar</label>
            <input id="avatar" name="avatar" type="file" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-200 focus:outline-none dark:bg-green-600 dark:border-gray-200 dark:placeholder-gray-400 mt-1" id="default_size" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 font-medium bg-green-500 uppercase text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
        </div>
    </form>
</section>