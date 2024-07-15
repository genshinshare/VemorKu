<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white m-auto">
                            Edit Kendaraan
                        </p>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 dark:bg-gray-700 mb-5">
                    {{-- Form --}}
                    <form action="/kendaraan/{{$vehicle['vehicle']['vehicle_id']}}" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        @method('put')
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                <label for="vehicle_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle ID <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input value="{{$vehicle['vehicle']['vehicle_id']}}" type="text" id="vehicle_id" name="vehicle_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('vehicle_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input value="{{$vehicle['vehicle']['type']}}" type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('type')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="engine_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Engine Number <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input value="{{$vehicle['vehicle']['engine_number']}}" type="text" id="engine_number" name="engine_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('engine_number')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="year_build" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Built <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input value="{{$vehicle['vehicle']['year_build']}}" type="number" id="year_build" name="year_build" min="2000" max="{{date('Y')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('year_build')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <select id="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="department_id">
                                    @foreach ($department['department'] as $d)
                                        @if ($d['id'] === $vehicle['vehicle']['department_id'])
                                            <option value="{{$d['id']}}" selected>{{$d['department_name']}}</option>
                                        @endif
                                        <option value="{{$d['id']}}">{{$d['department_name']}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="driver_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <select id="driver_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="driver_id">
                                    @foreach ($driver['driver'] as $d)
                                        @if ($d['id'] === $vehicle['vehicle']['driver_id'])
                                            <option value="{{$d['id']}}" selected>{{$d['driver_name']}}</option>
                                        @endif
                                        <option value="{{$d['id']}}">{{$d['driver_name']}}</option>
                                    @endforeach
                                </select>
                                @error('driver_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="branch" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Branch <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input value="{{$vehicle['vehicle']['branch']}}" type="text" id="branch" name="branch" value="31 - Lampung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('branch')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-6">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="status">
                                    @if ($vehicle['vehicle']['status'] == 1)
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    @else
                                        <option value="1">Aktif</option>
                                        <option value="0" selected>Tidak Aktif</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="status_remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Remark</label>
                                <input value="{{$vehicle['vehicle']['status_remark']}}" type="text" id="status_remark" name="status_remark" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white active:scale-95 duration-300 bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Perbarui</button>
                        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute active:scale-95 duration-300 top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Tutup</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Apa anda yakin ingin</h3>
                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">ingin memperbarui</h3>
                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Kendaraan ini?</h3>
                                        <button type="submit" class="mt-5 active:scale-95 text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Perbarui!
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="text-white active:scale-95 duration-300 bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="/kendaraan">
                        <button class="mt-2 active:scale-95 duration-300 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batal</button>
                    </a>           
                </div>
            </div>
        </div>
    </div>
</x-app-layout>