<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="textanime font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2> --}}
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-neutral-200 shadow sm:rounded-lg border-2 border-neutral-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-semibold text-gray-700 uppercase dark:text-dark-100 mb-1">
                                {{ __('Company Information') }}
                            </h2>
                            <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-green-600 dark:text-green-600">
                                {{ __("Show Data") }}
                            </p>
                        </header>
                        @if (session('message'))
                            <div class="text-red-500 font-arial">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="p-4 sm:p-8 bg-green-600 shadow sm:rounded-lg border-2 border-gray-300">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-100 uppercase dark:text-green-400 mb-1">
                                    {{ __('Company Data') }}
                                </h2>
                                <p style="font-family: arial;" class="mb-4 font-semibold text-sm text-gray-600 dark:text-gray-300">
                                    {{ __("Information of Company") }}
                                </p>
                            </div>
                            <div class="mt-3 font-arial">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
                                    <tr>
                                        <th>Investor Name :</th>
                                        <td>{{$userdata->investor_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Name :</th>
                                        <td>{{$userdata->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Registration No :</th>
                                        <td>{{$userdata->company_reg_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>Business Type :</th>
                                        <td>{{$userdata->businesstype_detail}}</td>
                                    </tr>
                                    <tr>
                                        <th>Business Location :</th>
                                        <td>{{$userdata->business_location}}</td>
                                    </tr>
                                    <tr>
                                        <th>Permit No :</th>
                                        <td>{{$userdata->permit_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>Land Area :</th>
                                        <td>{{$userdata->land_area}}</td>
                                    </tr>
                                    <tr>
                                        <th>Countries :</th>
                                        <td>{{$userdata->country->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Sectors :</th>
                                        <td>{{$userdata->sector->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Geolocation :</th>
                                        <td>{{$userdata->geolocation}}</td>
                                    </tr>
                                    <tr>
                                        <th>Investment Type :</th>
                                        <td>
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
                                        <a href="{{route('userdata.index')}}" class="font-arial text-semibold uppercase items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</a>
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
