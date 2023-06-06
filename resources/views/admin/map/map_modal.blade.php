<!-- Main modal -->
<div id="map-modal" aria-hidden="true"
    class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" style="z-index: 99999;">
    <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-3 border-b rounded-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 font-arial" id="company_header">
            </h3>
            <button type="button" id="map_close"
                class="bg-transparent hover:text-gray-300 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-300 hover:text-white">
                <svg class="w-5 h-5" fill="gray" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <!-- Modal body -->
        <div class="m-auto w-11/12">
            <div class="flex flex-wrap -mx-2 mt-2">
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="company_name" :value="__('Company Name')" />
                    <x-text-input id="map_company_name" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="company_reg_no" :value="__('Company Registration No.')" />
                    <x-text-input id="map_company_reg_no" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="company_reg_date" :value="__('Company Registration Date')" />
                    <x-text-input id="map_company_reg_date" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="permit_no" :value="__('Permit No.')" />
                    <x-text-input id="map_permit_no" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="permit_date" :value="__('Permit Date')" />
                    <x-text-input id="map_permit_date" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="permit_type" :value="__('Permit Type')" />
                    <x-text-input id="map_permit_type" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="form_of_invest" :value="__('Form of Investment')" />
                    <x-text-input id="map_form_of_invest" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="investor_name" :value="__('Investor Name')" />
                    <x-text-input id="map_investor_name" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="investor_phone" :value="__('Phone Number')" />
                    <x-text-input id="map_investor_phone" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="investor_email" :value="__('Email')" />
                    <x-text-input id="map_investor_email" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="businesstype" :value="__('Business Type')" />
                    <x-text-input id="map_businesstype" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="sector" :value="__('Sector')" />
                    <x-text-input id="map_sector" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="region" :value="__('Region')" />
                    <x-text-input id="map_region" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="district" :value="__('District')" />
                    <x-text-input id="map_district" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="township" :value="__('Township')" />
                    <x-text-input id="map_township" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="zone" :value="__('Business Zone')" />
                    <x-text-input id="map_zone" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="land_area" :value="__('Land Area')" />
                    <x-text-input id="map_land_area" type="text" class="w-full" disabled/>
                </div>
                <div class="w-full md:w-1/4 px-2 mt-2">
                    <x-input-label for="land_type" :value="__('Land Type')" />
                    <x-text-input id="map_land_type" type="text" class="w-full" disabled/>
                </div>
            </div>
        </div>
        <div class="flex mt-4 items-center p-3 space-x-2 border-t rounded-b border-gray-200">
            <button type="button" id="map-close-btn"
                    class="inline-flex items-center px-4 py-2 font-medium focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-red-600 hover:bg-red-700 focus:ring-red-800 font-arial text-white">Cancel</button>
        </div>
    </div>
</div>
