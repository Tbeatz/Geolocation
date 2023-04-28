<section>
    <header>
        <h2 class="text-lg font-semibold text-dark-900 dark:text-dark-100 mb-1">
            {{ __('USER AVATAR') }}
        </h2>
        <p style="color:#3b82f6; font-family: arial;" class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add or update your avatar!") }}
        </p>
        <img class="w-20 h-20 p-1 rounded-full ring-2 ring-gray-300 dark:ring-dark-500" src="{{"/storage/$user->avatar"}}" alt="">
    </header>
    @if (session('message'))
        <div class="text-red-500">
            {{session('message')}}
        </div>
    @endif
    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf
        @method('patch')
        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <input id="avatar" name="avatar" type="file" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-1" id="default_size" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
