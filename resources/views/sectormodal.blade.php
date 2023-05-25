<!-- Main modal -->
<div id="my-modal" aria-hidden="true"
    class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-900 font-arial">
                Sector
            </h3>
            <button type="button" id="close-btn1"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <!-- Modal body -->
        <form enctype="multipart/form-data" class="sector_form" id="sector_form_id">
            <div class="mt-2" id="sector_message">
            </div>
            <div class="mt-2" id="sector_error">
            </div>
            <div class="m-auto w-3/4">
                <div class="mt-2">
                    <table class="w-full mb-4">
                        <tr class="text-center">
                            <td class="border-r border-gray-300">
                                <div class="w-full mb-4 flex flex-col items-center">
                                    <label for="icon_info" class="text-gray-900 uppercase font-arial font-semibold text-sm">Current</label>
                                    <img class="w-20 h-20 sector_icon rounded-full ring-1 mt-3 ring-gray-200 dark:ring-gray-300" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="w-full mb-4 flex flex-col items-center">
                                    <label for="icon_info" class="text-gray-900 uppercase font-arial font-semibold text-sm">New</label>
                                    <div class="w-20 h-20 rounded-full ring-1 border-0 mt-3 ring-gray-200 dark:ring-gray-300">
                                        <img class="opacity-0 w-20 h-20 sector_previewicon" alt="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="w-full flex flex-row items-center">
                        <label for="sector_name" class="text-gray-900 sector_name font-arial mr-5 font-semibold text-sm"></label>
                        <input id="icon_input" name="icon" type="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 font-arial focus:outline-none dark:bg-white dark:border-gray-300 dark:placeholder-gray-900 mt-1"
                            required autofocus/>
                        <div class="font-arial text-red-500 font-semibold text-sm mb-4 mt-2" id="sector_error">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex mt-4 items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-200">
                <button type="button" id="sectoricon_save"
                    class="inline-flex items-center px-4 py-2 font-medium bg-green-500 text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-greenprimary dark:hover:bg-green-700 dark:focus:ring-green-800 font-arial">Update</button>
                <button type="button" id="close-btn"
                    class="inline-flex items-center px-4 py-2 font-medium bg-green-500 text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 font-arial">Cancel</button>
            </div>
        </form>
    </div>
</div>
