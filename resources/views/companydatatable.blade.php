<div class="table-data">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-1 space-y-6">
        <table style="font-family:arial;" id="my-table" class="w-full text-sm text-white-200 dark:text-white-200 text-center">
            <thead
                class="text-gray-200 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-00">
                <tr>
                    <td class="py-3 w-16">No.</td>
                    <td>Investor Name</td>
                    <td>Company Name</td>
                    <td>Company Registration No.</td>
                    <td>Permit No.</td>
                    <td class="w-28">Action</td>
                    <td><a class="inline-flex font-arial text-semibold uppercase items-center px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-sm hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" href="{{ route('userdata.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </a></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($userdatas as $userdata)
                    <tr
                        class="bg-white border-b dark:bg-green-600 dark:border-gray-200 hover:bg-green-50 dark:hover:bg-green-500 search_row">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $userdata->investor_name }}</td>
                        <td>{{ $userdata->company_name }}</td>
                        <td>{{ $userdata->company_reg_no }}</td>
                        <td>{{ $userdata->permit_no }}</td>
                        <td>
                            <div class="inline-flex m-2">
                                <a href="{{ route('userdata.show', $userdata) }}" class="bg-gray-900 hover:bg-gray-400 text-white-800 font-semibold py-2 px-2 rounded-l">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                                <a href="{{route('userdata.edit', $userdata)}}" class="bg-yellow-600 hover:bg-yellow-400 text-white-800 font-semibold py-2 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('userdata.destroy',$userdata) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure want to delete?!')" class="bg-red-600 hover:bg-red-400 text-white-800 font-semibold py-2 px-2 rounded-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                          </svg>
                                    </button>
                                </form>
                            </div>

                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination font-arial">
        {{$userdatas->links()}}
    </div>
</div>
