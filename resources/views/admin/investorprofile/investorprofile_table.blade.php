<div class="investorprofile-data1">
    <div class="relative overflow-x-auto sm:rounded-lg mt-1 space-y-6">
        <table id="investorprofile_table1" class="w-full font-arial text-sm text-white-200 text-center">
            <thead
                class="bg-white text-gray-700 font-semibold border-b-2">
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
                        class="border-b h-12 bg-white border-gray-200 hover:bg-gray-100 text-gray-700">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->profile->company_name }}</td>
                        <td>{{ $user->profile->company_reg_no }}</td>
                        <td>{{ $user->profile->permit_no }}</td>
                        <td>{{ $user->profile->permit_date }}</td>
                        <td>
                            <div class="inline-flex gap-2">
                                    <button id="company_view" value="{{$user->profile->id}}" class="font-medium text-blue-500 hover:underline">
                                        View
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="investorprofile_paginate font-arial mt-4">
        {{$users->links()}}
    </div>
</div>
