<div class="table-data1">
    <div class="relative overflow-x-auto sm:rounded-lg mt-1 space-y-6">
        <table id="my-table1" class="w-full font-arial text-sm text-white-200 dark:text-white-200 text-center">
            <thead
                class="text-gray-200 bg-gray-50 dark:bg-white dark:text-gray-900 font-semibold border-b-2">
                <tr>
                    <td class="py-3 pl-2">No.</td>
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
                        class="bg-white border-b h-12 dark:bg-white dark:border-gray-200 hover:bg-green-50 dark:hover:bg-gray-100 dark:text-gray-900">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->profile->company_name }}</td>
                        <td>{{ $user->profile->company_reg_no }}</td>
                        <td>{{ $user->profile->permit_no }}</td>
                        <td>{{ $user->profile->permit_date }}</td>
                        <td>
                            <div class="inline-flex gap-2">
                                <form method="post"
                                    action="{{ route('users.approve', $user) }}">
                                    @csrf
                                    @method('patch')
                                    <button id="company_approve" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Approve
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="white"
                                            class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                        </svg> --}}
                                    </button>
                                </form>
                                <p>|</p>
                                <form method="post"
                                    action="{{ route('users.reject', $user) }}">
                                    @csrf
                                    @method('delete')
                                    <button id="company_reject" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Reject
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="white" class="bi bi-x"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg> --}}
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginate1 font-arial mt-4">
        {{$users->links()}}
    </div>
</div>
