<x-app-layout>
    <div class="pt-12 ps-12 pe-12">
        <div class="max-w-full md:hidden block">
            <div class="overflow-hidden md:rounded-lg">
                <div class="p-4 text-gray-900">
                    <a href="/" class="text-xl font-bold text-gray-900 dark:text-white text-center">
                        <h2>Dashboard</h2>
                    </a>
                </div>
            </div>
            <a href="/kendaraan" class="text-blue-900 hover:text-white">
                <div class="bg-white hover:bg-blue-900 transform transition duration-300 hover:scale-105 overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900 mb-5">
                    <div class="p-6 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="auto" width="20%" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="currentColor" d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                        <div style="width: 85%; height:auto;" class="m-auto">
                            <h2 class="text-xl font-bold m-auto text-center mb-5">Total Kendaraan</h2>
                            <p class="text-center">{{ $vehicle['total_vehicle'] }}</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/laporan" class="text-blue-900 hover:text-white">
                <div class="bg-white hover:bg-blue-900 transform transition duration-300 hover:scale-105 overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900 mb-5">
                    <div class="p-6 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="auto" width="15%" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        <div style="width: 85%; height:auto;" class="m-auto">
                            <h2 class="text-xl font-bold m-auto text-center mb-5">Total Laporan Jalan</h2>
                            <p class="text-center"> {{ $report['report']['total'] }} </p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/laporanKlaim" class="text-blue-900 hover:text-white">
                <div class="bg-white hover:bg-blue-900 transform transition duration-300 hover:scale-105 overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900">
                    <div class="p-6 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="auto" width="15%" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        <div style="width: 85%; height:auto;" class="m-auto">
                            <h2 class="text-xl font-bold dark:text-white m-auto text-center mb-5">Total Laporan Klaim</h2>
                            <p class="text-center"> {{ $report_finance['report_finance']['total'] }} </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6 pt-5">
            <div class="w-full h-full mx-auto mb-5">
                <div class="bg-white overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white m-auto text-center mb-5">Terakhir Ditambahkan</h2>
                        <ol class="relative border-s border-gray-400">
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $dateV }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kendaraan</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $vehicle['vehicle'][0]['vehicle_id'] }}</p>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $status }}</p>
                                @if ( $status == 'Tidak Aktif' )
                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ $vehicle['vehicle'][0]['status_remark'] }}</p>
                                @endif
                            </li>
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $dateR }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Jalan</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $report['report']['data'][0]['vehicle_id'] }}</p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ $report['report']['data'][0]['remark'] }}</p>
                            </li>
                            <li class="ms-4">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $dateRF }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Klaim</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $report_finance['report_finance']['data'][0]['vehicle_id'] }}</p>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $report_finance['report_finance']['data'][0]['remark'] }}</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="w-full h-full mx-auto mb-5 hidden md:block">
                <div class="overflow-hidden md:rounded-lg">
                    <div class="text-gray-900">
                        <a href="/" class="text-4xl font-bold text-gray-900 dark:text-white text-center">
                            <h2>Dashboard</h2>
                        </a>
                        <hr class="h-1 border-blue-900 rounded md:my-3 border-2 w-full">
                    </div>
                </div>
                <a href="/kendaraan" class="text-blue-900 hover:text-white">
                    <div class="bg-white hover:bg-blue-900 transform transition duration-300 hover:scale-105 overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900 mb-5">
                        <div class="p-6 flex">
                            <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" height="auto" width="20%" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="currentColor" d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                            <div style="width: 85%; height:auto;">
                                <h2 class="text-xl font-bold m-auto text-center mb-5">Total Kendaraan</h2>
                                <p class="text-center">{{ $vehicle['total_vehicle'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/laporan" class="text-blue-900 hover:text-white">
                    <div class="bg-white hover:bg-blue-900 transform transition duration-300 hover:scale-105 overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900 mb-5">
                        <div class="p-6 flex">
                            <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" height="auto" width="15%" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                            <div style="width: 85%; height:auto;">
                                <h2 class="text-xl font-bold m-auto text-center mb-5">Total Laporan Jalan</h2>
                                <p class="text-center"> {{ $report['report']['total'] }} </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/laporanKlaim" class="text-blue-900 hover:text-white">
                    <div class="bg-white hover:bg-blue-900 transform transition duration-300 hover:scale-105 overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900">
                        <div class="p-6 flex">
                            <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" height="auto" width="15%" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                            <div style="width: 85%; height:auto;">
                                <h2 class="text-xl font-bold dark:text-white m-auto text-center mb-5">Total Laporan Klaim</h2>
                                <p class="text-center"> {{ $report_finance['report_finance']['total'] }} </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full h-full mx-auto mb-5">
                <div class="bg-white overflow-hidden shadow-lg md:rounded-lg border-b-2 border-blue-900">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white m-auto text-center mb-5">Terakhir Diperbarui</h2>
                        <ol class="relative border-s border-gray-400">
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $dateNewV }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kendaraan</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $vehicleNew['vehicle'][0]['vehicle_id'] }}</p>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $status }}</p>
                                @if ( $status == 'Tidak Aktif' )
                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ $vehicleNew['vehicle'][0]['status_remark'] }}</p>
                                @endif
                            </li>
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $dateNewR }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Jalan</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $reportNew['report']['data'][0]['vehicle_id'] }}</p>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ $reportNew['report']['data'][0]['remark'] }}</p>
                            </li>
                            <li class="ms-4">
                                <div class="absolute w-3 h-3 bg-gray-400 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $dateNewRF }}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Klaim</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $report_finance_new['report_finance']['data'][0]['vehicle_id'] }}</p>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $report_finance_new['report_finance']['data'][0]['remark'] }}</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
