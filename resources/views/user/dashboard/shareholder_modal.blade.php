<!-- Main modal -->
<div id="shareholder-modal" aria-hidden="true"
    class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-200">
            <h3 class="text-xl font-semibold text-gray-700 font-arial">
                Shareholder
            </h3>
            <button type="button" id="shareholder_close"
                class="bg-transparent hover:text-gray-300 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-300 hover:text-white">
                <svg class="w-5 h-5" fill="gray" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <!-- Modal body -->
        <form enctype="multipart/form-data" class="shareholder_form" id="shareholder_form_id">
            <div class="mt-2" id="shareholder_message">
            </div>
            <div class="mt-2" id="shareholder_error">
            </div>
            <div class="m-auto w-3/4">
                <div class="flex flex-wrap -mx-2 mt-2">
                    <div class="w-full md:w-1/2 px-2 mt-2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="shareholder_name" name="name" type="text" class="w-full" :value="old('name', $profile?->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="w-full md:w-1/2 px-2 mt-2">
                        <x-input-label for="designation" :value="__('Designation')" />
                        <x-text-input id="shareholder_designation" name="designation" type="text" class="w-full" :value="old('designation', $profile?->designation)" required autofocus autocomplete="designation" />
                        <x-input-error class="mt-2" :messages="$errors->get('designation')" />
                    </div>
                    <div class="w-full md:w-1/2 px-2 mt-2">
                        <x-input-label for="passport_nrc" :value="__('Passport/NRC')" />
                        <x-text-input id="shareholder_passport_nrc" name="passport_nrc" type="text" class="w-full" :value="old('passport_nrc', $profile?->passport_nrc)" required autofocus autocomplete="passport_nrc" />
                        <x-input-error class="mt-2" :messages="$errors->get('passport_nrc')" />
                    </div>
                    <div class="w-full md:w-1/2 px-2 mt-2">
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="shareholder_address" name="address" type="text" class="w-full" :value="old('address', $profile?->address)" required autofocus autocomplete="address" />
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>
                    <div class="w-full md:w-1/2 px-2 mt-2">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="shareholder_phone" name="phone" type="text" class="w-full" :value="old('phone', $profile?->phone)" required autofocus autocomplete="phone" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>
                    <div class="w-full md:w-1/2 px-2 mt-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="shareholder_email" name="email" type="text" class="w-full" :value="old('email', $profile?->email)" required autofocus autocomplete="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <div class="w-full md:w-full px-2 mt-2">
                        <x-input-label for="nationality_id" :value="__('Nationality')" />
                        <select name="nationality_id" id="shareholder_nationality_id" class="mt-1 p-2 text-sm block w-full font-arial border-gray-300 bg-white text-gray-700 focus:border-greenprimary focus:ring-lime-600 rounded-md shadow-sm" required>
                            <option value="" @if (!$profile?->nationality_id) selected @endif>Select an Option</option>
                            @foreach ($nationalities as $nationality)
                                <option value="{{$nationality?->id}}" @if ($profile?->nationality_id == $nationality?->id) selected @endif>{{$nationality->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('nationality_id')" />
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex mt-4 items-center p-6 space-x-2 border-t rounded-b border-gray-200">
                <button type="button" id="shareholder_save"
                    class="inline-flex items-center px-4 py-2 font-medium focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-greenprimary hover:bg-green-700 focus:ring-green-800 font-arial text-white">Save</button>
                <button type="button" id="shareholder_update"
                    class="inline-flex items-center px-4 py-2 font-medium focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-greenprimary hover:bg-green-700 focus:ring-green-800 font-arial text-white">Update</button>
                <button type="button" id="shareholder-close-btn"
                    class="inline-flex items-center px-4 py-2 font-medium focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-4 py-2 bg-red-600 hover:bg-red-700 focus:ring-red-800 font-arial text-white">Cancel</button>
            </div>
        </form>
    </div>
</div>
