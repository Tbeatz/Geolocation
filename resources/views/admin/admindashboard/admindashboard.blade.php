<x-app-layout>
    <x-slot name="header">
        <div>
            @vite('resources/js/admin/admindashboard/admindashboard.js')
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div id="user_info" class="hidden">{{ json_encode($users) }}</div>
        <div class="p-4 sm:p-4 bg-white shadow sm:rounded-lg border-2 border-neutral-300">
            <div class="p-6 text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-semibold text-gray-700 mb-1 font-arial">
                            {{ __('Investment Analysis') }}
                        </h2>
                        <p class="mb-4 font-semibold font-arial text-sm text-greenprimary">
                            {{ __('Analysis of data') }}
                        </p>
                    </header>
                </section>
                <div class="max-w-full mx-auto">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/2 px-2 mt-1">
                            <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                Investment Type Data Analysis
                            </h4>
                            <div id="chart" style="height:4in;width:5in" class="mt-3 px-2"></div>
                        </div>
                        <div class="w-full md:w-1/2 px-2 mt-1">
                            <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                Permit Type Data Analysis
                            </h4>
                            <div id="chart2" style="height:4in;width:5in" class="mt-3 px-2"></div>
                        </div>
                        <div class="w-full md:w-full px-2 mt-1">
                            <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                Sectors' Data Analysis
                            </h4>
                            <div id="sectorChart" style="height:5in;width:100%" class="mt-3 px-2"></div>
                        </div>
                        <div class="w-full md:w-full px-2 mt-4">
                            <h4 class="text-sm font-semibold text-gray-700 font-arial">
                                Yearly Data Analysis
                            </h4>
                            <div id="lineChart" style="height:4in;width:100%" class="mt-3 px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
