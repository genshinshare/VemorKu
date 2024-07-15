<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <p class="text-3xl font-bold text-gray-900 m-auto">
                            Tambah Departemen
                        </p>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 mb-5">
                    {{-- Form --}}
                    <form action="/departemen/store" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="mb-6">
                            <label for="department_name" class="block mb-2 text-sm font-medium text-gray-900">Department Name <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                            <input autocomplete="off" type="text" id="department_name" name="department_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block sm:w-1/2 w-full p-2.5" >
                            @error('department_name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-small">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white active:scale-95 duration-300 bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center">Tambahkan</button>
                        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="absolute active:scale-95 duration-300 top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Tutup</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <h3 class="text-lg font-normal text-gray-500">Apa anda yakin ingin</h3>
                                        <h3 class="text-lg font-normal text-gray-500">ingin menambahkan</h3>
                                        <h3 class="text-lg font-normal text-gray-500">Departemen ini?</h3>
                                        <button type="submit" class="mt-5 active:scale-95 duration-300 text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Tambahkan!
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="text-white active:scale-95 duration-300 bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="/departemen">
                        <button class="mt-2 active:scale-95 duration-300 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center">Batal</button>
                    </a>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>