<x-app-layout>
    <x-slot name="header">
        <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-dark-900 dark:text-dark-100 mb-1">
                                {{ __('ADMIN') }}
                            </h2>
                            <p style="color:#3b82f6; font-family: arial;"
                                class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Approve the company') }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6 space-y-6">
                            <table class="w-full text-sm text-left text-white-500 dark:text-white-400 text-center">
                                <thead
                                    class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-white-400">
                                    <tr>
                                        <td>No.</td>
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
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
                                                            class="bg-blue-600 hover:bg-blue-400 text-white-800 font-semibold py-2 px-2 rounded-l">
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
                                                            class="bg-green-600 hover:bg-green-400 text-white-800 font-semibold py-2 px-2 rounded-r">
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
