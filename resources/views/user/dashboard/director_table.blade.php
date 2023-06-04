<div class="director_table_data">
    <div class="relative overflow-x-auto sm:rounded-lg mt-1 space-y-6">
        <table id="director_table" class="w-full font-arial text-sm text-white-200 text-center">
            <thead
                class="bg-white text-gray-700 font-semibold border-b-2">
                <tr>
                    <td class="py-3 w-16">No.</td>
                    <td>Name</td>
                    <td>Passport/NRC</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Nationality</td>
                    <td class="w-28">Action</td>
                    <td>
                        <a id="director_add" class="inline-flex font-arial text-semibold uppercase items-center px-2 py-2 text-xs font-medium text-center rounded-lg focus:ring-2 focus:outline-none bg-greenprimary hover:bg-green-500 focus:ring-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($directors as $director)
                    <tr
                        class="border-b h-12 bg-white border-gray-200 hover:bg-gray-100 text-gray-700">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $director->name }}</td>
                        <td>{{ $director->passport_nrc }}</td>
                        <td>{{ $director->address }}</td>
                        <td>{{ $director->phone }}</td>
                        <td>{{ $director->email }}</td>
                        <td>{{ $director->nationality->name }}</td>
                        <td>
                            <div class="inline-flex gap-2">
                                <button value="{{$director->id}}" class="director_edit font-medium text-blue-500 hover:underline">
                                    Edit
                                </button>
                                <p>|</p>
                                <button id="director_delete" value="{{$director->id}}" class="font-medium text-blue-500 hover:underline">
                                    Delete
                                </button>
                            </div>

                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="director_pagination font-arial mt-4">
        {{$directors->links()}}
    </div>
</div>
