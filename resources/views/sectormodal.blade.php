
<!-- Modal toggle -->
<button id="open-btn" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
</button>

  <!-- Main modal -->
  <div id="my-modal" aria-hidden="true" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
      <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-900 font-arial">
                Sectors
            </h3>
            <button type="button" id="close-btn1" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @if (session('message'))
            <div style="font-family:arial;" class="text-red-500 font-semibold">
                {{ session('message') }}
            </div>
        @endif
        <!-- Modal body -->
        <form method="post" action="{{ route('sector.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="m-auto w-3/4">
                <div class="mt-2">
                    <div class="w-full">
                        <label for="icon" class="text-gray-900 font-arial font-semibold text-sm">Icon</label>
                        <input id="icon" name="icon" type="file" class="block w-full mb-3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-900 font-arial focus:outline-none dark:bg-white dark:border-gray-300 dark:placeholder-gray-900 mt-1" id="default_size" :value="old('icon', $sectors->icon)" required autofocus autocomplete="icon" />
                        <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                    </div>
                    <div class="w-full">
                        <label for="sector_id" class="text-gray-900 font-arial font-semibold text-sm">Sector</label>
                        <select id="sector_id" name="sector_id" class="mt-1 font-arial w-full border border-gray-300 rounded-md block p-2 dark:bg-white dark:border-gray-300 dark:placeholder-gray-900 dark:text-gray-900 dark:focus:ring-green-600 dark:focus:border-green-500" required>
                            <option value="" selected>Select an Option</option>
                            @foreach ($sectors as $sector)
                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                    </div>
                </div>
            </div>
                <!-- Modal footer -->
            <div class="flex mt-4 items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-200">
                <button type="submit" class="inline-flex items-center px-4 py-2 font-medium bg-green-500 text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-arial">Update</button>
                <button id="close-btn" class="inline-flex items-center px-4 py-2 font-medium bg-green-500 text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 font-arial">Cancel</button>
            </div>
        </form>
      </div>
  </div>
