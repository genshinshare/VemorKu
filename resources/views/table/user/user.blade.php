<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <a href="/akun/tambah" class="no-decoration">
                            <button class="text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-[22px] hover:rounded-md text-sm p-3 m-auto text-center focus:rounded-md focus:bg-blue-900 active:scale-95">
                                <div class="flex">
                                    <p class="text-sm">Tambah</p>
                                    <i class="fa-solid fa-circle-plus fa-xl m-auto ms-2"></i>
                                </div>
                            </button>
                        </a>
                        <a href="/akun" class="text-4xl font-bold text-gray-900 dark:text-white m-auto text-center">
                            <h2>Akun</h2>
                        </a>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 dark:bg-gray-700">
                    <form action="/akun/cari" method="GET">
                        @csrf
                        <div class="md:flex">
                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select name="kategori" id="underline_select" onchange="saveLastSelectedCategory(this.value)" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                <option value="name" id="opsi_kategori" selected>Name</option>
                                <option value="id" id="opsi_kategori">ID</option>
                                <option value="email" id="opsi_kategori">Email</option>
                            </select>
                            <div class="relative w-full">
                                @if ($cari == true)
                                    <input autocomplete="off" value="{{$cari_akun}}" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Pencarian" name="cari_akun">
                                @else
                                    <input autocomplete="off" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Pencarian" name="cari_akun">
                                @endif
                                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 dark:bg-gray-700">
                    @if ($user['status'] == 404)
                        <div class="flex">
                            @if ($cari == true)
                                @php
                                    $kategoriRaw = request()->query('kategori');
                                    $kategori = str_replace('_', ' ', $kategoriRaw);
                                @endphp
                                <p class="text-lg">Pencarian "{{$cari_akun}}" di kategori [{{$kategori}}] tidak ditemukan.</p>
                            @else
                                <p class="text-lg">Tidak ada akun yang tersimpan di database.</p>
                            @endif
                        </div>
                    @else
                    @if ($cari == false)
                        @include('paginate.user')
                    @else
                        @include('paginate.searchUser')
                    @endif
                    {{-- Tabel --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border rounded p-1">
                                        Option
                                    </th>
                                    <th scope="col" class="px-6 py-3 border rounded p-1">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 border rounded p-1">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 border rounded p-1">
                                        Email
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user['user']['data'] as $u)
                                <tr class="bg-white border-b hover:bg-blue-600 hover:text-white transition duration-500 ease-in-out">
                                    <th width="10%" scope="row" class="px-6 py-4 border rounded p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        <a href="/akun/edit={{ $u['id'] }}">
                                            <button class="relative inline-flex items-center justify-center p-0.5 m-auto mb-1 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-900 to-blue-900 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                                <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                                </span>
                                            </button>
                                        </a>
                                        <br>
                                        <form action="/akun/hapus={{ $u['id'] }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button data-modal-target="popup-modal-{{ $u['id'] }}" data-modal-toggle="popup-modal-{{ $u['id'] }}" class="relative inline-flex items-center justify-center p-0.5 mb-auto overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800" type="button">
                                                <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    <i class="fa-solid fa-trash text-lg"></i>
                                                </span>
                                            </button>
                                            <div id="popup-modal-{{ $u['id'] }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $u['id'] }}">
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
                                                            <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Akun</h3>
                                                            <p>Nama: {{ $u['name'] }}</p>
                                                            <p>Email: {{ $u['email'] }}</p>
                                                            <button type="submit" class="mt-5 text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                Saya yakin, hapus!
                                                            </button>
                                                            <button data-modal-hide="popup-modal-{{ $u['id'] }}" type="button" class="bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 text-white">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </th>
                                    <td width="10%" class="px-6 py-4 border rounded p-1">
                                        {{ $u['id'] }}
                                    </td>
                                    <td width="30%" class="px-6 py-4 border rounded p-1">
                                        {{ $u['name'] }}
                                    </td>
                                    <td width="40%" class="px-6 py-4 border rounded p-1">
                                        {{ $u['email'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($cari == false)
                        @include('paginate.user')
                    @else
                        @include('paginate.searchUser')
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function saveLastSelectedCategory(value) {
        localStorage.setItem('lastSelectedCategoryAccount', value);
    }
    const lastSelectedCategoryAccount = localStorage.getItem('lastSelectedCategoryAccount');
    if (lastSelectedCategoryAccount) {
        document.getElementById('underline_select').value = lastSelectedCategoryAccount;
    }
</script>
