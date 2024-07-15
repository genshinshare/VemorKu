<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white m-auto">
                            Edit Laporan Jalan
                        </p>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 dark:bg-gray-700 mb-5">
                    {{-- Form --}}
                    <form action="/laporan/{{ $report['report']['report_id'] }}" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label for="vehicle_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle ID <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                            <select id="vehicle_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="vehicle_id">
                                @foreach ($vehicle['vehicle'] as $v)
                                    @if ($v['vehicle_id'] == $report['report']['vehicle_id'])
                                        <option value="{{$v['vehicle_id']}}" selected>{{$report['report']['vehicle_id']}}</option>
                                    @else
                                    <option value="{{$v['vehicle_id']}}">{{$v['vehicle_id']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('vehicle_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                <label for="departure_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departure Date <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input autocomplete="off" value="{{$report['report']['departure_date']}}" type="date" id="departure_date" name="departure_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('departure_date')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="departure_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departure Time <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input autocomplete="off" value="{{$report['report']['departure_time']}}" type="time" id="departure_time" name="departure_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('departure_time')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="arrival_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arrival Date</label>
                                <input autocomplete="off" value="{{$report['report']['arrival_date']}}" type="date" id="arrival_date" name="arrival_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('arrival_date')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="arrival_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arrival Time</label>
                                <input autocomplete="off" value="{{$report['report']['arrival_time']}}" type="time" id="arrival_time" name="arrival_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('arrival_time')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="mb-6">
                                <label for="km_before" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KM Before <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                <input autocomplete="off" value="{{$report['report']['km_before']}}" type="number" step="1" min="0" id="km_before" name="km_before" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('km_before')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="km_after" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KM After</label>
                                <input autocomplete="off" value="{{$report['report']['km_after']}}" type="number" step="1" min="0" id="km_after" name="km_after" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('km_after')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="fuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel</label>
                                <input autocomplete="off" value="{{$report['report']['fuel']}}" type="number" step="0.01" min="0.00" id="fuel" name="fuel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('fuel')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="fuel_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Cost</label>
                                <input autocomplete="off" value="{{$report['report']['fuel_cost']}}" type="number" min="0" id="fuel_cost" name="fuel_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                @error('fuel_cost')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remark <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                            <input value="{{$report['report']['remark']}}" autocomplete="off" type="text"  min="0" id="remark" name="remark" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('remark')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                            @enderror
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
                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Laporan Jalan ini?</h3>
                                        <button type="submit" class="mt-5 active:scale-95 duration-300 text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Perbarui!
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="text-white active:scale-95 duration-300 bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="/laporan">
                        <button class="mt-2 active:scale-95 duration-300 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batal</button>
                    </a>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>