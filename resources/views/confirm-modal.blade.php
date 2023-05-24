<div id="confirm_modal" tabindex="-1" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-40 mx-auto p-5 w-full max-w-md max-h-full">
        <div class="relative dark:bg-white rounded-lg shadow-l bg-gray-700">
            <button type="button" id="no_icon" class="absolute top-3 right-2.5 text-gray-400 bg-transparent dark:hover:bg-gray-200 dark:hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto mb-4 dark:text-gray-400 w-14 h-14 text-gray-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mb-5 text-lg font-arial dark:text-gray-500 text-gray-400">{{$message}}</h3>
                <button id="yes_btn" type="button" class="text-white font-arial bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none dark:focus:ring-green-300 focus:ring-green-800 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button id="no_btn" type="button" class="dark:text-gray-500 font-arial dark:bg-white dark:hover:bg-gray-100 dark:focus:ring-4 dark:focus:outline-none dark:focus:ring-gray-200 rounded-lg border border-gray-200 text-sm px-5 py-2.5 dark:hover:text-gray-900 focus:z-10 bg-gray-700 text-gray-300 border-gray-500 hover:text-white hover:bg-gray-600 focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>
