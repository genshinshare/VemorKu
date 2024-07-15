<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    @include('layouts.navigation')
  </nav>
  
  <aside id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full duration-300 ease-in-out bg-white border-r border-gray-200" aria-label="Sidebar" tabindex="-1">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-bold">
            <li>
                <a href="{{route('dashboard')}}" class="flex duration-300 items-center p-2 border-2 border-blue-900 rounded-lg hover:bg-blue-900 hover:text-white group">
                    <i style="width:30%; height:auto;" class="fa-solid fa-chart-line fa-lg m-auto text-center"></i>
                    <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Dashboard</span>
                </a>
            </li>
            <li>
                <button id="button-data" type="button" class="flex duration-300 items-center w-full p-2 hover:bg-blue-900 border-2 border-blue-900 hover:text-white text-base rounded-tr-lg rounded-tl-lg" aria-controls="dropdown-sidebar" data-collapse-toggle="dropdown-sidebar">
                      <i style="width:30%; height:auto;"class="fa-solid fa-table-columns fa-lg m-auto text-center"></i>
                      <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Data</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="dropdown-sidebar" class="hidden transition-all py-2 space-y-2 bg-gray-200 border-2 border-blue-900 border border-solid border-black rounded-br-lg rounded-bl-lg">
                    <li>
                        <a href="{{route('vehicle')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-car fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Kendaraan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('report')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-file-lines fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start"> Laporan Jalan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('reportFinance')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-file-invoice-dollar fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start"> Laporan Klaim</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('department')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-building fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Departemen</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('driver')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-id-badge fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Driver</span>
                        </a>
                    </li>
                    @php
                        $role = auth()->user()->role;
                    @endphp
                    @if ( $role == 'admin' )
                        <li>
                            <a href="{{route('user')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                                <i style="width:30%; height:auto;"class="fa-solid fa-users-gear fa-lg m-auto text-center"></i>
                                <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Akun</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <li>
                <button id="button-export" type="button" class="flex duration-300 items-center w-full p-2 hover:bg-blue-900 border-2 border-blue-900 hover:text-white text-base rounded-tr-lg rounded-tl-lg" aria-controls="dropdown-sidebar-2" data-collapse-toggle="dropdown-sidebar-2">
                      <i style="width:30%; height:auto;"class="fa-solid fa-file-pdf fa-lg m-auto text-center"></i>
                      <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start">Export</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="dropdown-sidebar-2" class="hidden py-2 space-y-2 bg-gray-200 border-2 border-blue-900 border border-solid border-black rounded-br-lg rounded-bl-lg">
                    <li>
                        <a href="{{route('vemor')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-file-invoice fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start"> Vemor</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('carcondition')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-truck-pickup fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start"> Car Condition</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('expensetahunan')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-table-list fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start"> Expense Tahunan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('rasiobbm')}}" class="flex items-center p-2 duration-300 border-transparent border-blue-900 hover:text-white rounded-[30px] hover:rounded-none hover:bg-blue-900 focus:bg-blue-600 focus:shadow-xl focus:shadow-inner focus:rounded-none group active:scale-95 focus:text-white">
                            <i style="width:30%; height:auto;"class="fa-solid fa-gas-pump fa-lg m-auto text-center"></i>
                            <span style="width:70%; height:auto;" class="flex-1 whitespace-nowrap m-auto text-start"> Rasio BBM</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
     </div>
  </aside>
  <script>
    // Mendapatkan elemen yang ingin dicek
    const dropdownElement = document.getElementById('dropdown-sidebar');
    const dropdownElement2 = document.getElementById('dropdown-sidebar-2');

    const isDropdownHidden = localStorage.getItem('dropdownStatus');
    const isDropdownHidden2 = localStorage.getItem('dropdownStatus2');

    if (isDropdownHidden === "true") {
        dropdownElement.classList.remove("hidden");
    }

    if (isDropdownHidden2 === "true") {
        dropdownElement2.classList.remove("hidden");
    }

    window.addEventListener('beforeunload', () => {
        const newDropdownStatus = !dropdownElement.classList.contains('hidden');
        localStorage.setItem('dropdownStatus', newDropdownStatus);

        const newDropdownStatus2 = !dropdownElement2.classList.contains('hidden');
        localStorage.setItem('dropdownStatus2', newDropdownStatus2);
    });
</script>
