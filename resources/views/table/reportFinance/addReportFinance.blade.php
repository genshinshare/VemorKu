<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white m-auto">
                            Tambah Laporan Klaim
                        </p>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 dark:bg-gray-700 mb-5">
                    {{-- Form --}}
                    <form action="/laporanKlaim/store" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-6">
                                <label for="vehicle_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle ID <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i> <small>(Tidak perlu diisi jika klaim BBM)</small></label>
                                <select id="vehicle_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="vehicle_id">
                                    <option value="invalid">Pilih Vehicle ID</option>
                                    @foreach ($vehicle['vehicle'] as $v)
                                        <option value="{{$v['vehicle_id']}}">{{$v['vehicle_id']}}</option>
                                    @endforeach
                                </select>
                                @error('vehicle_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="report_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Report ID <small>(Isi kolom ini jika klaim BBM)</small></label>
                                <input autocomplete="off" type="number" min="1" id="report_id" name="report_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('report_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                @php
                                    $nowDate = now()->format('Y-m-d');
                                @endphp
                                <label for="date_recorded" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Recorded <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input autocomplete="off" value="{{$nowDate}}" type="date" id="date_recorded" name="date_recorded" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('date_recorded')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="date_of_application" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Application <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input autocomplete="off" type="date" id="date_of_application" name="date_of_application" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('date_of_application')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="fuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel</label>
                                <input autocomplete="off" type="number" step="0.01" min="0.00" id="fuel" name="fuel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('fuel')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="fuel_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Cost</label>
                                <input autocomplete="off" type="number" min="0" id="fuel_cost" name="fuel_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('fuel_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                <label for="stnk_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STNK Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="stnk_cost" name="stnk_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('stnk_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="kir_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KIR Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="kir_cost" name="kir_cost" value="31 - Lampung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('kir_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="repair_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repair Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="repair_cost" name="repair_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('repair_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="maintenance_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maintenance Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="maintenance_cost" name="maintenance_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('maintenance_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                <label for="carwash_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carwash Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="carwash_cost" name="carwash_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('carwash_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="toll_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Toll Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="toll_cost" name="toll_cost" value="31 - Lampung" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('toll_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="parking_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parking Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="parking_cost" name="parking_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('parking_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="other_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Cost</label>
                                <input autocomplete="off" type="number"  min="0" id="other_cost" name="other_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('other_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remark</label>
                            <input autocomplete="off" type="text"  min="0" id="remark" name="remark" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('remark')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white active:scale-95 duration-300 bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan</button>
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
                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">ingin menambahkan</h3>
                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Laporan Klaim ini?</h3>
                                        <button type="submit" class="mt-5 active:scale-95 duration-300 text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Tambahkan!
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="text-white active:scale-95 duration-300 bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="/laporanKlaim">
                        <button class="mt-2 active:scale-95 duration-300 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batal</button>
                    </a>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>