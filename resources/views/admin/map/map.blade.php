<x-app-layout>
    {{-- @vite('resources/js/admin/map/map.js') --}}
    <div id="map">
        <div class="leaflet-control coordinate font-arial text-red-600"></div>
        <div class="wrapper">
            <div class="leaflet-control p-7 p-4 sm:p-8 bg-white shadow sm:rounded-lg border-2 border-neutral-300 multisearch w-4/5 mx-auto hidden">
                <div class="selectContainer vertical-center">
                    <label class="mx-1 font-semibold text-sm font-arial uppercase text-gray-700" for="">Type</label>
                    <select class="multiSelect block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-300 focus:ring-lime-600 rounded-md shadow-sm" id="sel1" multiple
                        multiselect-search="true"
                        multiselect-select-all="true"
                        multiselect-max-items="1"
                    >
                        <option value="Local">Local</option>
                        <option value="Foreign">Foreign</option>
                    </select>
                    <label class="mx-1 font-semibold text-sm font-arial uppercase text-gray-700" for="">Sector</label>
                    <select class="multiSelect" id="sel2" multiple
                        multiselect-search="true"
                        multiselect-select-all="true"
                        multiselect-max-items="1"
                    >
                    </select>
                    <label class="mx-1 font-semibold text-sm font-arial uppercase text-gray-700" for="">District</label>
                    <select class="multiSelect" id="sel3" multiple
                        multiselect-search="true"
                        multiselect-select-all="true"
                        multiselect-max-items="1"
                    >
                    </select>
                    <label class="mx-1 font-semibold text-sm font-arial uppercase text-gray-700" for="">Township</label>
                    <select class="multiSelect" id="sel4" multiple
                        multiselect-search="true"
                        multiselect-select-all="true"
                        multiselect-max-items="1"
                    >
                    </select>
                </div>
                <div class="searchContainer vertical-center">
                    <button type="button" class="bg-greenprimary hover:bg-green-700 text-white font-bold py-2 px-3 mx-2 rounded searchBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <button type="button" class="remove bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </button>
                </div>
            </div>
            <div class="leaflet-control reset">
                <div class="sizeSetContainer vertical-center fixed">
                    <button type="button" id="ScreenSize" class="mb-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-3 mx-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrows-fullscreen" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z"/>
                        </svg>
                    </button><br>
                    <button type="button" class="mb-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-3 mx-2 rounded" id="Reset">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                        </svg>
                    </button><br>
                    <button type="button" class="bg-greenprimary hover:bg-green-700 text-white font-bold py-2 px-3 mx-2 rounded navbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-filter" viewBox="0 0 16 16">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="leaflet-control btn_container">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <button type="button" id="Country" class="inline-flex items-center px-4 py-2 text-sm font-medium border-t border-b focus:z-10 focus:ring-2 bg-blue-700 border-blue-600 text-white hover:text-white hover:bg-blue-600 focus:ring-blue-500 focus:text-white rounded-l-lg">
                        Country
                    </button>
                    <button type="button" id="State" class="inline-flex items-center px-4 py-2 text-sm font-medium border-t border-b focus:z-10 focus:ring-2 bg-blue-700 border-blue-600 text-white hover:text-white hover:bg-blue-600 focus:ring-blue-500 focus:text-white">
                        State & Region
                    </button>
                    <button type="button" id="District" class="inline-flex items-center px-4 py-2 text-sm font-medium border-t border-b focus:z-10 focus:ring-2 bg-blue-700 border-blue-600 text-white hover:text-white hover:bg-blue-600 focus:ring-blue-500 focus:text-white">
                        District
                    </button>
                    <button type="button" id="Township" class="inline-flex items-center px-4 py-2 text-sm font-medium border-t border-b focus:z-10 focus:ring-2 bg-blue-700 border-blue-600 text-white hover:text-white hover:bg-blue-600 focus:ring-blue-500 focus:text-white">
                        Township
                    </button>
                    <button type="button" id="Clear" class="inline-flex items-center px-4 py-2 text-sm font-medium border-t border-b rounded-r-md focus:z-10 focus:ring-2 bg-red-700 border-red-600 text-white hover:text-white hover:bg-red-600 focus:ring-blue-500 focus:text-white">
                        Clear
                    </button>
                  </div>
            </div>
        </div>
    </div>
    <script src="/data/geofactory.js"></script>
    <script src="/data/map/map.js"></script>
</x-app-layout>
