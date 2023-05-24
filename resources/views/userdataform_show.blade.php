<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold font-arial text-gray-700 dark:text-dark-100 mb-1">
                                {{ __('Company Data') }}
                            </h2>
                            <p class="mb-4 font-arial font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __("Information of Company") }}
                            </p>
                        </header>
                        <div class="w-full">
                            <div class="mt-3 font-arial">
                                <table class="w-full text-sm text-gray-500 dark:text-gray-900">
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Investor Name :</th>
                                        <td class="pl-24 p-2">{{$userdata->investor_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Company Name :</th>
                                        <td class="pl-24 p-2">{{$userdata->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Company Registration No :</th>
                                        <td class="pl-24 p-2">{{$userdata->company_reg_no}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Business Type :</th>
                                        <td class="pl-24 p-2">{{$userdata->businesstype_detail}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Business Location :</th>
                                        <td class="pl-24 p-2">{{$userdata->business_location}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Permit No :</th>
                                        <td class="pl-24 p-2">{{$userdata->permit_no}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Land Area :</th>
                                        <td class="pl-24 p-2">{{$userdata->land_area}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Countries :</th>
                                        <td class="pl-24 p-2">{{$userdata->country->name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Sectors :</th>
                                        <td class="pl-24 p-2">{{$userdata->sector->name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Geolocation :</th>
                                        <td class="pl-24 p-2">{{$userdata->geolocation}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-r p-2 border-gray-300 w-64 text-left">Investment Type :</th>
                                        <td class="pl-24 p-2">
                                            @if ($userdata->type == '0')
                                                Local
                                            @elseif ($userdata->type == '1')
                                                Foreign
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <div class="w-3/4">
                                    <div class="gap-2 mt-5">
                                        <a href="{{route('userdata.index')}}" class="inline-flex items-center px-3 py-2 font-medium bg-green-500 text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 font-arial">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
