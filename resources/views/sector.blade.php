<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2> --}}
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-4 bg-neutral-200 shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
                                {{ __('Sectors') }}
                            </h2>
                            <p style="font-family: arial;"
                                class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __('Manage icons for sectors') }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div style="font-family:arial;" class="text-red-500 font-semibold">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('sector.update') }}" class="p-4 sm:p-8 bg-green-600 shadow sm:rounded-lg border-2 border-gray-300" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div>
                                <h2 class="text-lg font-semibold text-gray-100 uppercase dark:text-green-400 mb-1">
                                    {{ __('Sector Icons') }}
                                </h2>
                                <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-300">
                                    {{ __("Add your data correctly.") }}
                                </p>
                            </div>
                            <div class="m-auto w-3/4">
                                <table class="w-full text-sm text-white-200 dark:text-white-200 font-arial font-semibold text-left">
                                    @foreach ($sectors as $index => $sector)
                                        @if ($index >= 0 && $index <= 11)
                                            @if ($index % 2 === 0)
                                                <tr class="bg-white border-b dark:bg-green-600 dark:border-lime-400 hover:bg-green-50 dark:hover:bg-green-500">
                                            @endif
                                            <td class="w-28"></td>
                                            <td class="py-3">
                                                <img class="w-16 h-16 rounded-full ring-1 ring-gray-100 dark:ring-gray-100" src="{{ "/storage/$sector->icon" }}" alt="">
                                            </td>
                                            <td>{{ $sector->name }}</td>
                                            @if ($index % 2 === 3)
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </table>

                                <div class="mt-2">
                                    <div class="w-full">
                                        <x-input-label for="icon" :value="__('Icon')" />
                                        <input id="icon" name="icon" type="file" class="block w-full mb-3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 font-arial focus:outline-none dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 mt-1" id="default_size" :value="old('icon', $sectors->icon)" required autofocus autocomplete="icon" />
                                        <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="sector_id" :value="__('Sector')" />
                                        <select id="sector_id" name="sector_id" class="mt-1 font-arial w-full border border-gray-300 rounded-md block p-2 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-lime-600 dark:focus:border-blue-500" required>
                                            <option value="" selected>Select an Option</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 mt-6">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
