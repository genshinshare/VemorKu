@php
    $pageNumber = request()->get('halaman');
    $startRange = max(1, $pageNumber - 1);
    $endRange = min($startRange + 2, $user['user']['last_page']);
    $startRange = max(1, $endRange - 2);
    $lebih = false;
@endphp

<nav role="navigation" class="flex items-center justify-between">
    <div class="flex justify-between flex-1 sm:hidden">
        @if ( $pageNumber == 1 )
            <a href="/akun?halaman={{$pageNumber}}" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">&laquo;</a>
        @else
            <a href="/akun?halaman={{$pageNumber - 1}}" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">&laquo;</a>
        @endif
        <div class="text-sm text-gray-700 leading-5">
            <p>Menampilkan {{$user['user']['from']}} sampai {{$user['user']['to']}} dari total {{$user['user']['total']}} Akun</p>
        </div>
        @if ( $pageNumber == $user['user']['last_page'] )
            <a href="/akun?halaman={{$pageNumber}}" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">&raquo;</a>
        @else
            <a href="/akun?halaman={{$pageNumber + 1}}" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">&raquo;</a>
        @endif
    </div>
    
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="text-sm text-gray-700 leading-5">
            <p>Menampilkan {{$user['user']['from']}} sampai {{$user['user']['to']}} dari total {{$user['user']['total']}} Akun</p>
            </div>
            <div class="pagination">
            <a href="/akun?halaman=1" class="rounded-l hover:bg-blue-600 hover:text-white relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">&laquo;&laquo;</a>
            @if ( $pageNumber == null )
                <a href="/akun" name="pageNumber" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-600 border border-gray-300 cursor-default leading-5">1</a>
                @if ($user['user']['last_page'] < 4)
                    @for ($i = 2; $i <= $user['user']['last_page']; $i++)
                        @php
                            $lebih = true
                        @endphp
                        <a href="/akun?halaman={{ $i }}" name="pageNumber" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">{{ $i }}</a>
                    @endfor
                @else
                    @for ($i = 2; $i <= 3; $i++)
                        @php
                            $lebih = true
                        @endphp
                        <a href="/akun?halaman={{ $i }}" name="pageNumber" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">{{ $i }}</a>
                    @endfor 
                @endif
            @else
                @for ($i = $startRange; $i <= $endRange; $i++)
                    @if ( $pageNumber == $i )
                        <a href="/akun?halaman={{ $i }}" name="pageNumber" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-600 border border-gray-300 cursor-default leading-5">{{ $i }}</a>
                    @else
                        <a href="/akun?halaman={{ $i }}" name="pageNumber" class="relative inline-flex hover:bg-blue-600 hover:text-white items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">{{ $i }}</a>
                    @endif
                @endfor
            @endif
            <a href="/akun?halaman={{ $user['user']['last_page'] }}" class="rounded-r hover:bg-blue-600 hover:text-white relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">&raquo;&raquo;</a>
            </div>
    </div>
</nav>