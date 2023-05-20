<div class="sector-table-data">
    <div class="relative overflow-x-auto sm:rounded-lg mt-1 space-y-6">
        <table id="sector-table" class="w-full font-arial text-sm text-white-200 dark:text-white-200 text-center">
            <thead
                class="text-gray-200 bg-gray-50 dark:bg-white dark:text-gray-900 font-semibold border-b-2">
                <tr>
                    <td class="py-3 pl-2">No.</td>
                    <td>Icon</td>
                    <td>Sector Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectors as $sector)
                    <tr
                        class="bg-white border-b h-12 dark:bg-white dark:border-gray-200 hover:bg-green-50 dark:hover:bg-gray-100 dark:text-gray-900">
                        <td>{{ $loop->iteration }}</td>
                        <td class="flex justify-center items-center py-3">
                            <img class="w-16 h-16 rounded-full ring-1 ring-gray-200 dark:ring-gray-200" src="{{ "/storage/$sector->icon" }}" alt="">
                        </td>
                        <td>{{ $sector->name }}</td>
                        <form method="post" action="#">
                            @csrf
                            <td>
                                <div class="inline-flex">
                                    <input type="hidden" value="{{$sector->name}}">
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Edit
                                    </button>
                                </div>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="sectorpaginate font-arial mt-4">
        {{$sectors->links()}}
    </div>
</div>