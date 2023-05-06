<x-app-layout>
    <x-slot name="header">
        <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registered Companies') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-4 bg-neutral-200 shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
                                {{ __('ADMIN') }}
                            </h2>
                            <p style="font-family: arial;"
                                class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __('Approve the company') }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div style="font-family:arial;" class="text-red-500 font-semibold">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6 space-y-6">
                            <table style="font-family:arial;" class="w-full text-sm text-white-200 dark:text-white-200 text-center">
                                <thead
                                    class="text-gray-200 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-00">
                                    <tr>
                                        <td class="py-3">No.</td>
                                        <td>Company Name</td>
                                        <td>Company Registration No.</td>
                                        <td>Permit No.</td>
                                        <td>Permit Date</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr
                                            class="bg-white border-b dark:bg-green-600 dark:border-gray-200 hover:bg-green-50 dark:hover:bg-green-500">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->profile->company_name }}</td>
                                            <td>{{ $user->profile->company_reg_no }}</td>
                                            <td>{{ $user->profile->permit_no }}</td>
                                            <td>{{ $user->profile->permit_date }}</td>
                                            <td>
                                                <div class="inline-flex m-2">
                                                    <form method="post"
                                                        action="{{ route('users.approve', $user) }}">
                                                        @csrf
                                                        @method('patch')
                                                        <button
                                                            onclick="return confirm('Are you sure you want to approve?')"
                                                            class="bg-gray-900 hover:bg-gray-400 text-white-800 font-semibold py-2 px-2 rounded-l">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-check" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <form method="post"
                                                        action="{{ route('users.reject', $user) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            onclick="return confirm('Are you sure you want to reject?')"
                                                            class="bg-red-600 hover:bg-red-400 text-white-800 font-semibold py-2 px-2 rounded-r">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-x"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
