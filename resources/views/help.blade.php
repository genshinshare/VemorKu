<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="/help">
                        <h2 class="text-lg font-medium text-gray-900">
                            Petunjuk
                        </h2>
                    </a>
                    <hr class="h-1 bg-gray-100 rounded md:my-3">
                    <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-900 bold border-3 text-2xl text-white">
                        <h2 id="accordion-color-heading-1">
                        <button type="button" class="flex duration-300 items-center justify-between w-full p-5 font-medium rtl:text-right border border-b-0 border-black focus:ring-4 focus:ring-blue-200 bg-blue-600 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="false" aria-controls="accordion-color-body-1">
                            <span class="text-white">Apa itu {{ config('app.name')}}?</span>
                            <svg data-accordion-icon class="w-3 h-3 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 L5 5 L9 1"/>
                            </svg>
                        </button>
                        </h2>
                        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
                            <div class="p-5 border border-b-0 border-black bg-white">
                                <p class="mb-2 text-black">
                                    {{ config('app.name') }} adalah sistem informasi berbasis web yang ditujukan untuk 
                                    mengumpulkan data - data dari SJK dan Klaim yang berkaitan sehingga dapat membuat laporan 
                                    <a href="/vemor" class="underline text-blue-500 hover:text-blue-900" target="_blank">Vemor</a>, 
                                    <a href="/carcondition" class="underline text-blue-600 hover:text-blue-900" target="_blank">Car Condition</a>, 
                                    <a href="/expensetahunan" class="underline text-blue-600 hover:text-blue-900" target="_blank">Expense Tahunan</a>, dan
                                    <a href="/rasiobbm" class="underline text-blue-600 hover:text-blue-900" target="_blank">Rasio BBM</a> sesuai dengan data yang ada di database.
                                </p>
                            </div>
                        </div>
                        <h2 id="accordion-color-heading-2">
                        <button type="button" class="flex duration-300 items-center justify-between w-full p-5 font-medium rtl:text-right border border-b-0 border-black focus:ring-4 focus:ring-blue-200 bg-blue-600 gap-3" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
                            <span class="text-white">Menu Data</span>
                            <svg data-accordion-icon class="w-3 h-3 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 L5 5 L9 1"/>
                            </svg>
                        </button>
                        </h2>
                        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                            <div class="p-5 border border-b-0 border-black dark:border-gray-700">
                                <p class="mb-2 text-black">
                                    Menu Data adalah menu yang berguna untuk melakukan input data ke dalam database sesuai dengan tabel submenu yang dipilih. Data yang telah diinputkan ke database, nanti dapat 
                                    dikelola oleh sistem untuk membuat laporan secara otomatis sesuai dengan permintaan laporan yang diberikan oleh user pada menu Export.
                                </p>
                                <hr class="h-1 bg-gray-100 rounded md:my-3">
                                <p class="mb-2 text-black">
                                    Di dalam menu Data terdapat 5 submenu yaitu 
                                    <a href="/kendaraan" class="underline text-blue-500 hover:text-blue-900" target="_blank">Kendaraan</a>, 
                                    <a href="/laporan" class="underline text-blue-500 hover:text-blue-900" target="_blank">Laporan Jalan</a>, 
                                    <a href="/laporanKlaim" class="underline text-blue-500 hover:text-blue-900" target="_blank">Laporan Klaim</a>, 
                                    <a href="/departemen" class="underline text-blue-500 hover:text-blue-900" target="_blank">Departemen</a>, dan 
                                    <a href="/driver" class="underline text-blue-500 hover:text-blue-900" target="_blank">Driver</a> 
                                    yang dapat di klik untuk masuk ke halaman submenu tersebut untuk menambah, mengedit, menghapus, ataupun mencari data dari tabel submenu tersebut.
                                </p>
                                <hr class="h-1 bg-gray-100 rounded md:my-3">
                                <p class="mb-2 text-black">Catatan:</p>
                                <ul>
                                    <li class="mb-2">
                                        <p class="font-extrabold">Kendaraan</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                <p>Ketika menambahkan dan mengedit Kendaraan terdapat kolom berikut.</p>
                                                <div class="grid md:grid-cols-4 md:gap-6 mt-2">
                                                    <div class="mb-6">
                                                        <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                        <select id="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="department_id">
                                                            <option value="invalid">Pilih Department</option>
                                                            @foreach ($department['department'] as $d)
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
                                                            <option value="invalid">Pilih Driver</option>
                                                            @foreach ($driver['driver'] as $d)
                                                                <option value="{{$d['id']}}">{{$d['driver_name']}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('driver_id')
                                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <p>Anda harus memilih urutan yang sama. Misal Department adalah MARKETING, maka pilih Driver juga MARKETING seperti berikut.</p>
                                                <div class="grid md:grid-cols-4 md:gap-6 mt-2">
                                                    <div class="mb-6">
                                                        <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                        <select id="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="department_id">
                                                            <option value="invalid">Pilih Department</option>
                                                            @foreach ($department['department'] as $d)
                                                                @if ($d['department_name'] === 'MARKETING')
                                                                    <option value="{{$d['id']}}" selected>{{$d['department_name']}}</option>
                                                                @else
                                                                    <option value="{{$d['id']}}">{{$d['department_name']}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('department_id')
                                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-6">
                                                        <label for="driver_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                        <select id="driver_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="driver_id">
                                                            <option value="invalid">Pilih Driver</option>
                                                            @foreach ($driver['driver'] as $d)
                                                            @if ($d['driver_name'] === 'MARKETING')
                                                                <option value="{{$d['id']}}" selected>{{$d['driver_name']}}</option>
                                                            @else
                                                                <option value="{{$d['id']}}">{{$d['driver_name']}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('driver_id')
                                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <p class="text-red-600 italic font-bold">
                                                    Harap input department dan driver dengan benar agar tidak terjadi error ketika export laporan Car Condition.
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mb-2">
                                        <p class="font-extrabold">Laporan Jalan</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Laporan Jalan adalah laporan yang didapatkan datanya dari Surat Jalan Kendaraan (SJK).
                                            </li>
                                            <li>
                                                Laporan Jalan dapat memiliki keterkaitan dengan Laporan Klaim ketika Laporan Jalan tersebut 
                                                merupakan TLO (Pengendara menjalankan tugas di luar kota dan menginap). Laporan Klaim yang 
                                                berkaitan dengan Laporan Jalan hanya Laporan Klaim untuk pengisian BBM di luar kota.
                                            </li>
                                            <li>
                                                Harap berhati-hati ketika menghapus Laporan Jalan, karena Laporan Klaim yang berkaitan dengan
                                                 Laporan Jalan tersebut akan ikut terhapus dari database.
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mb-2">
                                        <p class="font-extrabold">Laporan Klaim</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Laporan Klaim adalah laporan yang didapatkan datanya dari departemen FA. Laporan Klaim ini 
                                                berisikan Laporan yang berkaitan dengan biaya yang dibutuhkan kendaraan yang terdaftar.
                                            </li>
                                            <li>
                                                <span class="italic font-bold">Date Recorded</span> dan <span class="italic font-bold">Date of Application</span> memiliki 
                                                peranan berbeda. <span class="italic font-bold">Date Recorded</span> adalah tanggal diterima
                                                nya Klaim, sedangkan <span class="italic font-bold">Date of Application</span> adalah tanggal kegiatan 
                                                tersebut dilakukan. Misal ada pengisian Solar Luar Kota pada tanggal 30/10/2023 
                                                (<span class="italic font-bold">Date of Application</span>) namun Klaim diterima 05/11/2023 
                                                (<span class="italic font-bold">Date Recorded</span>). Maka pada Vemor, Laporan Klaim 
                                                akan masuk pada Vemor bulan November dengan tanggal yang ditampilkan adalah 30/10/2023.
                                            </li>
                                            <li>
                                                <p>Di form tambah atau edit Laporan Klaim terdapat 2 kolom dibawah ini.</p>
                                                <div class="grid md:grid-cols-2 md:gap-6 mt-2">
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
                                                <p>
                                                    Seperti yang tertera pada keterangan nama kolom input tersebut, pilihlah satu kolom saja untuk diisi, 
                                                    jika Laporan Klaim tersebut merupakan Klaim BBM TLO maka isi saja kolom input Report ID (Laporan Jalan 
                                                    yang TLO tersebut), selain dari Klaim BBM TLO maka kolom input Vehicle ID yang harus diisi.
                                                </p>
                                                <p class="text-red-600 italic font-bold">
                                                    Perlu diingat bahwa ketika anda mengisi kolom input Report ID, maka kolom Vehicle ID tidak akan diterima 
                                                    inputnya oleh sistem, karena setelah user klik tombol Tambahkan atau Perbarui,  
                                                    sistem akan langsung otomatis mengisi Vehicle ID sesuai Laporan Jalan dengan Report ID yang dimasukkan tadi.
                                                </p>
                                            </li>
                                            <li>
                                                Pada tambah Laporan Klaim, kolom input Date Recorded akan terisi tanggal hari ini secara otomatis untuk memudahkan 
                                                user ketika ingin menambahkan laporan, anda tetap dapat menggantinya dengan tanggal yang diinginkan.
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mb-2">
                                        <p class="font-extrabold">Departemen</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Departemen merupakan tabel yang berisikan list departemen yang akan muncul di pilihan kolom input Department pada form 
                                                tambah dan edit Kendaraan.
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mb-2">
                                        <p class="font-extrabold">Driver</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Driver merupakan tabel yang berisikan list driver yang akan muncul di pilihan kolom input Driver pada form 
                                                tambah dan edit Kendaraan.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <hr class="h-1 bg-gray-100 rounded md:my-3">
                                <p class="mb-2 text-black">Fitur - fitur yang tersedia : (Contoh berikut dari tabel Laporan Klaim)</p>
                                <ol class="list-decimal ps-5 pe-5">
                                    <li class="pb-4">
                                        <p class="mb-2">Pencarian</p>
                                        <form action="/laporanKlaim/cari" method="GET" class="pb-2" target="_blank">
                                            @csrf
                                            <div class="md:flex">
                                                <label for="underline_select" class="sr-only">Underline select</label>
                                                <select name="vehicleID" id="underline_select2" onchange="saveLastSelectedCategory2(this.value)" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                                    <option value="all" id="vehicleID" selected>All Vehicle</option>
                                                    @foreach ($vehicle['vehicle'] as $v)
                                                        <option value="{{$v['vehicle_id']}}" id="vehicleID">{{$v['vehicle_id']}}</option>
                                                    @endforeach
                                                </select>
                                                <select name="kategori" id="underline_select" onchange="saveLastSelectedCategory(this.value)" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-1 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-e-lg md:rounded-none hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                                    <option value="report_finance_id" id="opsi_kategori" selected>Report Finance ID</option>
                                                    <option value="report_id" id="opsi_kategori">Report ID Terkait</option>
                                                    <option value="date_of_application" id="opsi_kategori">Date of Application</option>
                                                    <option value="date_recorded" id="opsi_kategori">Date Recorded</option>
                                                    <option value="fuel" id="opsi_kategori">Fuel</option>
                                                    <option value="fuel_cost" id="opsi_kategori">Fuel Cost</option>
                                                    <option value="stnk_cost" id="opsi_kategori">STNK Cost</option>
                                                    <option value="kir_cost" id="opsi_kategori">KIR Cost</option>
                                                    <option value="repair_cost" id="opsi_kategori">Repair Cost</option>
                                                    <option value="maintenance_cost" id="opsi_kategori">Maintenance Cost</option>
                                                    <option value="carwash_cost" id="opsi_kategori">Carwash Cost</option>
                                                    <option value="toll_cost" id="opsi_kategori">Toll Cost</option>
                                                    <option value="parking_cost" id="opsi_kategori">Parking Cost</option>
                                                    <option value="other_cost" id="opsi_kategori">Other Cost</option>
                                                    <option value="remark" id="opsi_kategori">Remark</option>
                                                </select>
                                                <div class="relative w-full">
                                                    <input autocomplete="off" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Pencarian" name="cari_laporanKlaim">
                                                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                        </svg>
                                                        <span class="sr-only">Search</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="bg-gray-300 p-2">
                                            <p>Keterangan:</p>
                                            <ul class="list-disc ps-5 pe-5">
                                                <li class="pt-2 pb-2">
                                                    <select name="vehicleID" id="underline_select2" onchange="saveLastSelectedCategory2(this.value)" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                                    <option value="all" id="vehicleID" selected>All Vehicle</option>
                                                    @foreach ($vehicle['vehicle'] as $v)
                                                        <option value="{{$v['vehicle_id']}}" id="vehicleID">{{$v['vehicle_id']}}</option>
                                                    @endforeach
                                                </select>
                                                    Kategori Kendaraan.Berguna untuk memilih kendaraan mana yang akan masuk dalam pencarian.
                                                </li>
                                                <li class="pt-2 pb-2">
                                                    <select name="kategori" id="underline_select" onchange="saveLastSelectedCategory(this.value)" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-1 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-e-lg md:rounded-none hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                                        <option value="report_finance_id" id="opsi_kategori" selected>Report Finance ID</option>
                                                        <option value="report_id" id="opsi_kategori">Report ID Terkait</option>
                                                        <option value="date_of_application" id="opsi_kategori">Date of Application</option>
                                                        <option value="date_recorded" id="opsi_kategori">Date Recorded</option>
                                                        <option value="fuel" id="opsi_kategori">Fuel</option>
                                                        <option value="fuel_cost" id="opsi_kategori">Fuel Cost</option>
                                                        <option value="stnk_cost" id="opsi_kategori">STNK Cost</option>
                                                        <option value="kir_cost" id="opsi_kategori">KIR Cost</option>
                                                        <option value="repair_cost" id="opsi_kategori">Repair Cost</option>
                                                        <option value="maintenance_cost" id="opsi_kategori">Maintenance Cost</option>
                                                        <option value="carwash_cost" id="opsi_kategori">Carwash Cost</option>
                                                        <option value="toll_cost" id="opsi_kategori">Toll Cost</option>
                                                        <option value="parking_cost" id="opsi_kategori">Parking Cost</option>
                                                        <option value="other_cost" id="opsi_kategori">Other Cost</option>
                                                        <option value="remark" id="opsi_kategori">Remark</option>
                                                    </select>
                                                    Kategori Pencarian. Berguna untuk memilih kategori pencariannya, misal pilihnya Report Finance ID maka sistem akan mencari keyword yang diinput user berdasarkan kategori Report Finance ID saja.
                                                </li>
                                                <li class="pt-2 pb-2">
                                                    <input autocomplete="off" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Pencarian" name="cari_laporanKlaim">
                                                    Box Input Keyword. Berguna untuk memasukkan keyword pencarian, setelah mengisi keyword anda bisa langsung enter ataupun klik tombol pencarian di sebelahnya untuk melakukan pencarian berdasarkan kategori yang telah dipilih sebelumnya.
                                                </li>
                                                <li class="pt-2 pb-2">
                                                    <button type="submit" class="p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                        </svg>
                                                        <span class="sr-only">Search</span>
                                                    </button>
                                                    Tombol Pencarian. Berguna untuk memulai pencarian berdasarkan kategori dan keyword yang diterima.
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="pb-4">
                                        <p class="mb-2">Tambah</p>
                                        <div class="flex pb-2">
                                            <a href="/laporanKlaim/tambah" class="no-decoration" target="_blank">
                                                <button class="text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-[22px] hover:rounded-md text-sm p-3 m-auto text-center">
                                                    <div class="flex">
                                                        <p class="text-sm">Tambah</p>
                                                        <i class="fa-solid fa-circle-plus fa-xl m-auto ms-2"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <a href="/laporanKlaim" class="text-4xl font-bold text-gray-900 dark:text-white m-auto text-center" target="_blank">
                                                <h2>Laporan Klaim</h2>
                                            </a>
                                        </div>
                                        <div class="bg-gray-300 p-2">
                                            <p>Keterangan:</p>
                                            <ul class="list-disc ps-5 pe-5">
                                                <li class="pt-2 pb-2">
                                                    <a href="/laporanKlaim/tambah" class="no-decoration" target="_blank">
                                                        <button class="text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-[22px] hover:rounded-md text-sm p-3 m-auto text-center">
                                                            <div class="flex">
                                                                <p class="text-sm">Tambah</p>
                                                                <i class="fa-solid fa-circle-plus fa-xl m-auto ms-2"></i>
                                                            </div>
                                                        </button>
                                                    </a>
                                                    Tombol Tambah.Berguna untuk menambah atau menginput data ke dalam database sesuai dengan halaman tabel apa yang sedang dibuka, dalam contoh ini adalah 
                                                    halaman tabel Laporan Klaim. Setelah tombol tambah di klik maka akan muncul halaman form yang dapat diisi untuk input data ke tabel yang sedang dibuka lalu akan disimpan ke database.
                                                </li>
                                                <li class="pt-2 pb-2">
                                                    <a href="/laporanKlaim" class="text-4xl font-bold text-gray-900 dark:text-white m-auto text-center" target="_blank">
                                                        <h2>Laporan Klaim</h2>
                                                    </a>
                                                    adalah nama dari tabel di halaman yang sedang dibuka. Nama tabel tersebut dapat di klik untuk membuka atau merefresh halaman tabel tersebut.
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="pb-4">
                                        <p class="mb-2">Edit</p>
                                            <button class="relative inline-flex items-center justify-center p-0.5 m-auto mb-1 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-900 to-blue-900 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                                <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                                </span>
                                            </button>
                                        <div class="bg-gray-300 p-2">
                                            <p>Keterangan:</p>
                                            <ul class="list-disc ps-5 pe-5">
                                                <li class="pt-2 pb-2">
                                                    Tombol Edit.Berguna untuk mengedit data di database. Setelah tombol edit di klik maka akan muncul halaman form yang dapat diubah datanya. Struktur form dari edit sama dengan struktur form tambah, bedanya pada form edit kolom inputnya sudah terisikan data sebelumnya yang diambil dari database.
                                                </li>
                                                <li class="pt-2 pb-2 italic">
                                                    Untuk tombol edit di petunjuk ini tidak aktif, untuk menghindari terjadinya perubahan data yang tidak diinginkan di database.
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="pb-4">
                                        <p class="mb-2">Hapus</p>
                                        <button data-modal-target="popup-modal-1" data-modal-toggle="popup-modal-1" class="relative inline-flex items-center justify-center p-0.5 mb-auto overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800" type="button">
                                            <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                <i class="fa-solid fa-trash text-lg"></i>
                                            </span>
                                        </button>
                                        <div id="popup-modal-1" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-1">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Tutup</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Apa anda yakin menghapus?</h3>
                                                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Laporan Klaim</h3>
                                                        <p>(Vehicle ID))</p>
                                                        <p>Keterangan:</p>
                                                        <p>(Deskripsi Laporan Klaim)</p>
                                                        <p>yang diajukan pada tanggal</p>
                                                        <p>(tanggal pengajuan)</p>
                                                        <button type="submit" class="mt-5 text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Saya yakin, hapus!
                                                        </button>
                                                        <button data-modal-hide="popup-modal-1" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="bg-gray-300 p-2 mt-2">
                                            <p>Keterangan:</p>
                                            <ul class="list-disc ps-5 pe-5">
                                                <li class="pt-2 pb-2">
                                                    Tombol Hapus.Berguna untuk menghapus data di baris yang sama dengan tombol. Setelah tombol hapus di klik maka akan muncul pop up untuk konfirmasi penghapusan data. Pop up tersebut bertujuan untuk menghindari kesalahan klik oleh pengguna dan memberikan informasi data apa yang akan dihapus.
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <h2 id="accordion-color-heading-3">
                        <button type="button" class="flex duration-300 items-center justify-between w-full p-5 font-medium rtl:text-right border border-black focus:ring-4 focus:ring-blue-200 bg-blue-600 gap-3" data-accordion-target="#accordion-color-body-3" aria-expanded="false" aria-controls="accordion-color-body-3">
                            <span class="text-white">Menu Export</span>
                            <svg data-accordion-icon class="w-3 h-3 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1 L5 5 L9 1"/>
                            </svg>
                        </button>
                        </h2>
                        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                            <div class="p-5 border border-t-0 border-black dark:border-gray-700">
                                <p class="mb-2 text-black">
                                    Menu Export adalah menu yang berguna untuk mendapatkan laporan berupa Vemor, Car Condition, Expense Tahunan, atau Rasio BBM dalam format pdf sesuai 
                                    dengan yang dibutuhkan pengguna.
                                </p>
                                <hr class="h-1 bg-gray-100 rounded md:my-3">
                                <p class="mb-2 text-black">
                                    Di dalam Menu Export terdapat 4 submenu yaitu 
                                    <a href="/vemor" class="underline text-blue-500 hover:text-blue-900" target="_blank">Vemor</a>, 
                                    <a href="/carcondition" class="underline text-blue-500 hover:text-blue-900" target="_blank">Car Condition</a>  
                                    <a href="/expensetahunan" class="underline text-blue-500 hover:text-blue-900" target="_blank">Expense Tahunan</a> dan
                                    <a href="/rasiobbm" class="underline text-blue-500 hover:text-blue-900" target="_blank">Rasio BBM</a> 
                                    yang dimaksudkan untuk memudahkan pengguna membuat laporan sesuai yang dibutuhkan pengguna.
                                </p>
                                <hr class="h-1 bg-gray-100 rounded md:my-3">
                                <p class="mb-2 text-black">Catatan:</p>
                                <ul>
                                    <li>
                                        <p class="font-bold">Vemor</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Vemor (Vehicle Expenses Monthly Report) adalah laporan bulanan mengenai KM dan Biaya 
                                                penggunaan kendaraan selama satu bulan tersebut.
                                            </li>
                                            <li>
                                                Vemor menggunakan data dari tabel Kendaraan, Laporan Jalan, dan Laporan Klaim.
                                            </li>
                                            <li>
                                                Sistem akan tetap membuat pdf walaupun tidak ada Laporan Jalan ataupun Laporan Klaim 
                                                pada bulan dan tahun yang diminta oleh user, namun isi dari pdf Vemor tersebut hanya berupa 
                                                kerangka tabel Vemor dan identitas kendaraannya saja.
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <p class="font-bold">Car Condition</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Car Condition Data Utilitas Report adalah laporan bulanan semua kendaraan mengenai waktu penggunaannya selama 
                                                satu bulan.
                                            </li>
                                            <li>
                                                Car Condition menggunakan data dari tabel Kendaraan dan Laporan Jalan.
                                            </li>
                                            <li>
                                                Sistem akan tetap membuat pdf walaupun tidak ada Laporan Jalan pada tiap kendaraan di bulan 
                                                dan tahun yang diminta oleh user, namun isi dari pdf Car Condition tersebut hanya berupa 
                                                kerangka dari tabel Car Condition saja.
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <p class="font-bold">Expense Tahunan</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Expense Tahunan adalah laporan tahunan mengenai biaya yang dikeluarkan oleh tiap kendaraan 
                                                dalam satu tahun.
                                            </li>
                                            <li>
                                                Expense Tahunan menggunakan data dari tabel Kendaraan, Laporan Jalan, dan Laporan Klaim.
                                            </li>
                                            <li>
                                                Sistem akan tetap membuat pdf walaupun tidak ada Laporan Jalan dan Laporan Klaim pada 
                                                tiap kendaraan di tahun yang diminta oleh user, namun isi dari pdf Expenses Tahunan tersebut 
                                                hanya berupa kerangka dari tabel Expenses Tahunan saja.
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <p class="font-bold">Rasio BBM</p>
                                        <ul class="list-disc ps-5 pe-5">
                                            <li>
                                                Rasio BBM adalah laporan bulanan semua kendaraan mengenai rasio bbm selama satu bulan.
                                            </li>
                                            <li>
                                                Rasio BBM menggunakan data dari tabel Kendaraan, Laporan Jalan (yang mengisi BBM) dan Laporan 
                                                Klaim (pengisian BBM di Luar Kota).
                                            </li>
                                            <li>
                                                Untuk export pdf Rasio BBM, sistem membutuhkan 1 Laporan Jalan tiap kendaraan untuk pengisian BBM pertama kali. 
                                                Misal, user meminta laporan Rasio BBM bulan Oktober, maka sistem membutuhkan data Laporan Jalan untuk tiap kendaraan 
                                                memiliki pengisian BBM di bulan sebelumnya yang dimulai dari September atau sebelumnya lagi. Sistem tidak dapat membuat 
                                                pdf jika pengisian BBM pertama kali ada di bulan yang diminta oleh user.
                                            </li>
                                            <li>
                                                <p>
                                                    Jika terjadi error, error tersebut disebabkan karena dalam bulan yang diminta oleh user terdapat pengisian BBM pertama kali
                                                    oleh salah satu atau lebih mobil di database. Misal, bulan tersebut Oktober dan kendaraan BE8102OY mengisi BBM pertama kali di database 
                                                    pada bulan Oktober itu maka akan terjadi error.
                                                </p>
                                                <p>
                                                    Untuk mengatasinya, anda bisa membuat Laporan Jalan di bulan sebelumnya atau dalam contoh yaitu September, dengan :
                                                </p>
                                                <ul class="list-disc ps-5 pe-5">
                                                    <li>KM Before 1 KM kurang dari KM Before pada bulan Oktober (yang pengisian BBM pertama kali tadi)</li>
                                                    <li>KM After menggunakan KM Before pada pengisian BBM pertama kali tadi</li>
                                                    <li>Fuel isi 1.00 dan Fuel Cost sesuaikan dengan jenis BBM untuk 1 liternya, jangan lupa kurangi di Laporan Jalan pengisian BBM pertama kali tadi untuk Fuel dan Fuel Cost nya.</li>
                                                    <li>Departure Date dan Arrival Date isi pada bulan September</li>
                                                    <li>Jadi pengisian form nya menjadi seperti ini</li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="ps-5 pe-5 pt-5">
                                            <div class="mb-6">
                                                <label for="vehicle_id" class="block mb-2 text-sm font-medium text-gray-900">Vehicle ID <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                <select id="vehicle_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="vehicle_id">
                                                    <option value="invalid">Pilih Vehicle ID</option>
                                                    @foreach ($vehicle['vehicle'] as $v)
                                                        @if ($v['vehicle_id'] === 'BE8102OY')
                                                            <option value="{{$v['vehicle_id']}}" selected>{{$v['vehicle_id']}}</option>
                                                        @else
                                                            <option value="{{$v['vehicle_id']}}">{{$v['vehicle_id']}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('vehicle_id')
                                                    <p class="mt-2 text-sm text-red-600"><span class="font-small">{{ $message }}</span></p>
                                                @enderror
                                            </div>
                                            <div class="grid md:grid-cols-4 md:gap-6">
                                                <div class="mb-6">
                                                    <label for="departure_date" class="block mb-2 text-sm font-medium text-gray-900">Departure Date <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                    <input autocomplete="off" value="2023-09-01" type="date" id="departure_date" name="departure_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                                                    @error('departure_date')
                                                        <p class="mt-2 text-sm text-red-600"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                                <div class="mb-6">
                                                    <label for="departure_time" class="block mb-2 text-sm font-medium text-gray-900">Departure Time <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                    <input autocomplete="off" value="08:45" type="time" id="departure_time" name="departure_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                                                    @error('departure_time')
                                                        <p class="mt-2 text-sm text-red-600"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                                <div class="mb-6">
                                                    <label for="arrival_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arrival Date</label>
                                                    <input autocomplete="off" value="2023-09-01" type="date" id="arrival_date" name="arrival_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    @error('arrival_date')
                                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                                <div class="mb-6">
                                                    <label for="arrival_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Arrival Time</label>
                                                    <input autocomplete="off" value="09:10" type="time" id="arrival_time" name="arrival_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    @error('arrival_time')
                                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="grid md:grid-cols-4 md:gap-6">
                                                <div class="mb-6">
                                                    <label for="km_before" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KM Before <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                    <input autocomplete="off" value="119" type="number" step="1" min="0" id="km_before" name="km_before" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    @error('km_before')
                                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                                <div class="mb-6">
                                                    <label for="km_after" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KM After</label>
                                                    <input autocomplete="off" value="120" type="number" step="1" min="0" id="km_after" name="km_after" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    @error('km_after')
                                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                                <div class="mb-6">
                                                    <label for="fuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel</label>
                                                    <input autocomplete="off" value="1.00" type="number" step="0.01" min="0.00" id="fuel" name="fuel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    @error('fuel')
                                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                                <div class="mb-6">
                                                    <label for="fuel_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Cost</label>
                                                    <input autocomplete="off" value="6800" type="number" min="0" id="fuel_cost" name="fuel_cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                    @error('fuel_cost')
                                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-6">
                                                <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remark <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                                                <input autocomplete="off" type="text" value="Pengisian BBM Pertama Kali"  min="0" id="remark" name="remark" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                @error('remark')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <p class="pe-5 ps-5">Sehingga pengisian BBM di bulan Oktober tidak lagi menjadi pengisian BBM pertama kali untuk BE8102OY, jadi sistem dapat membuat Rasio BBM bulan Oktober.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>