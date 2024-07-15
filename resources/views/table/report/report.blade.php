<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <a href="/laporan/tambah" class="no-decoration">
                            <button class="text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:outline-none focus:ring-4 
                            focus:ring-blue-300 font-medium rounded-[22px] hover:rounded-md text-sm p-3 m-auto text-center 
                            focus:rounded-md focus:bg-blue-900 active:scale-95">
                                <div class="flex">
                                    <p class="text-sm">Tambah</p>
                                    <i class="fa-solid fa-circle-plus fa-xl m-auto ms-2"></i>
                                </div>
                            </button>
                        </a>
                        <a href="/laporan" class="text-4xl font-bold text-gray-900 m-auto text-center">
                            <h2>Laporan Jalan</h2>
                        </a>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3">
                    <form action="/laporan/cari" method="GET">
                        @csrf
                        <div class="md:flex">
                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select name="vehicleID" id="underline_select2" onchange="saveLastSelectedCategory2(this.value)" 
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center 
                            text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 
                            focus:outline-none focus:ring-gray-100">
                                <option value="all" id="vehicleID" selected>All Vehicle</option>
                                @foreach ($vehicle['vehicle'] as $v)
                                    <option value="{{$v['vehicle_id']}}" id="vehicleID">{{$v['vehicle_id']}}</option>
                                @endforeach
                            </select>
                            <select name="kategori" id="underline_select" onchange="saveLastSelectedCategory(this.value)" 
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-1 text-sm font-medium text-center 
                            text-gray-900 bg-gray-100 border border-gray-300 rounded-e-lg md:rounded-none hover:bg-gray-200 
                            focus:ring-4 focus:outline-none focus:ring-gray-100">
                                <option value="report_id" id="opsi_kategori" selected>Report ID</option>
                                <option value="departure_date" id="opsi_kategori">Departure Date</option>
                                <option value="departure_time" id="opsi_kategori">Departure Time</option>
                                <option value="arrival_date" id="opsi_kategori">Arrival Date</option>
                                <option value="arrival_time" id="opsi_kategori">Arrival Time</option>
                                <option value="km_before" id="opsi_kategori">KM Before</option>
                                <option value="km_after" id="opsi_kategori">KM After</option>
                                <option value="fuel" id="opsi_kategori">Fuel</option>
                                <option value="fuel_cost" id="opsi_kategori">Fuel Cost</option>
                                <option value="remark" id="opsi_kategori">Remark</option>
                            </select>
                            <div class="relative w-full">
                                @if ($cari == true)
                                    <input autocomplete="off" type="search" value="{{$cari_laporan}}" id="search-dropdown" 
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 
                                    border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                    placeholder="Pencarian" name="cari_laporan">
                                @else
                                    <input autocomplete="off" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 
                                    text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300
                                    focus:ring-blue-500 focus:border-blue-500" placeholder="Pencarian" name="cari_laporan">
                                @endif
                                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white 
                                bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                                focus:ring-blue-300">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                    viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr class="h-1 bg-gray-100 rounded md:my-3">
                    @if ($report['status'] == 404)
                        <div class="flex">
                            @if ($cari == true)
                                @php
                                    $kategoriRaw = request()->query('kategori');
                                    $kategori = str_replace('_', ' ', $kategoriRaw);
                                @endphp
                                <p class="text-lg">Pencarian "{{$cari_laporan}}" di kategori [{{$kategori}}] tidak ditemukan.</p>
                            @else
                                <p class="text-lg">Tidak ada laporan yang tersimpan di database.</p>
                            @endif
                        </div>
                    @else
                        @if ($cari == false)
                            @include('paginate.report')
                        @else
                            @include('paginate.searchReport')
                        @endif
                        {{-- table --}}
                        <div class="relative overflow-x-auto shadow-md md:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Option
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Report ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Vehicle ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1" style="padding-right: 1.8rem">
                                            Departure Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1" style="padding-right: 3.05rem">
                                            Arrival Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Departure Time
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Arrival Time
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            KM Before
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            KM After
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Total KM
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1 pr-20">
                                            Remark
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Fuel
                                        </th>
                                        <th scope="col" class="px-6 py-3 border rounded p-1">
                                            Fuel Cost
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($report['report']['data'] as $r)
                                    <tr class="bg-white border-b hover:bg-blue-600 hover:text-white transition duration-500 
                                    ease-in-out">
                                        <th scope="row" class="px-6 py-4 border rounded p-1 font-medium text-gray-900 
                                        whitespace-nowrap">
                                            <a href="/laporan/edit={{ $r['report_id'] }}">
                                                <button class="relative inline-flex items-center justify-center p-0.5 m-auto mb-1 
                                                overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br 
                                                from-blue-900 to-blue-900 group-hover:from-purple-600 group-hover:to-blue-500 
                                                hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white 
                                                    rounded-md group-hover:bg-opacity-0">
                                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                                    </span>
                                                </button>
                                            </a>
                                            <br>
                                            <form action="/laporan/hapus={{$r['report_id']}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button data-modal-target="popup-modal-{{ $r['report_id'] }}" 
                                                data-modal-toggle="popup-modal-{{ $r['report_id'] }}" 
                                                class="relative inline-flex items-center justify-center p-0.5 mb-auto overflow-hidden
                                                 text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 
                                                 to-red-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white 
                                                focus:ring-4 focus:outline-none focus:ring-blue-300" type="button">
                                                    <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white 
                                                    rounded-md group-hover:bg-opacity-0">
                                                        <i class="fa-solid fa-trash text-lg"></i>
                                                    </span>
                                                </button>
                                                <div id="popup-modal-{{ $r['report_id'] }}" tabindex="-1" class="hidden overflow-y-auto
                                                overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full 
                                                md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow">
                                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 
                                                            bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm 
                                                            w-8 h-8 ms-auto inline-flex justify-center items-center" 
                                                            data-modal-hide="popup-modal-{{ $r['report_id'] }}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                                                                fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" 
                                                                    stroke-linejoin="round" stroke-width="2" 
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Tutup</span>
                                                            </button>
                                                            <div class="p-4 md:p-5 text-center">
                                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" 
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                                                viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" 
                                                                    stroke-linejoin="round" stroke-width="2" 
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>
                                                                <h3 class="text-lg font-normal text-gray-500">
                                                                    Apa anda yakin menghapus?
                                                                </h3>
                                                                <h3 class="text-lg font-normal text-gray-500">
                                                                    Laporan Jalan
                                                                </h3>
                                                                <p>{{ $r['vehicle_id'] }}</p>
                                                                <p>Keterangan:</p>
                                                                <p>{{ $r['remark'] }}</p>
                                                                <p>pada tanggal</p>
                                                                <p>{{ $r['departure_date'] }}</p>
                                                                <button type="submit" class="mt-5 text-white bg-red-600 hover:bg-red-800 
                                                                focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg 
                                                                text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                    Saya yakin, hapus!
                                                                </button>
                                                                <button data-modal-hide="popup-modal-{{ $r['report_id'] }}" type="button" 
                                                                class="bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none 
                                                                focus:ring-gray-200 rounded-lg border border-gray-200 text-sm 
                                                                font-medium px-5 py-2.5 focus:z-10 text-white">Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </th>
                                        <td class="px-6 py-4 border rounded p-1 text-center">
                                            {{$r['report_id']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            {{$r['vehicle_id']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            {{$r['departure_date']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            @if($r['arrival_date'])
                                                {{$r['arrival_date']}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            {{$r['departure_time']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            @if($r['arrival_time'])
                                                {{$r['arrival_time']}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            {{$r['km_before']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            {{$r['km_after']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            @php
                                                if ($r['km_after'] == 0) {
                                                    $totalkm = null;
                                                } else {
                                                    $totalkm = $r['km_after'] - $r['km_before'];
                                                }
                                            @endphp
                                            {{$totalkm}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1">
                                            {{$r['remark']}}
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1 text-right">
                                            @if ($r['fuel'] === NULL)
                                                0.00
                                            @else
                                                {{$r['fuel']}}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 border rounded p-1 text-right">
                                            @php
                                            $biaya = number_format($r['fuel_cost'], 0, ',', '.');
                                            @endphp
                                            Rp.{{$biaya}},-
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($cari == false)
                            @include('paginate.report')
                        @else
                            @include('paginate.searchReport')
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function saveLastSelectedCategory(value) {
        localStorage.setItem('lastSelectedCategoryReport', value);
    }
    const lastSelectedCategoryReport = localStorage.getItem('lastSelectedCategoryReport');
    if (lastSelectedCategoryReport) {
        document.getElementById('underline_select').value = lastSelectedCategoryReport;
    }

    function saveLastSelectedCategory2(value) {
        localStorage.setItem('lastSelectedCategoryVehicle2', value);
    }
    const lastSelectedCategoryVehicle2 = localStorage.getItem('lastSelectedCategoryVehicle2');
    if (lastSelectedCategoryVehicle2) {
        document.getElementById('underline_select2').value = lastSelectedCategoryVehicle2;
    }
</script>