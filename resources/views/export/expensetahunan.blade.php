<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <p class="text-3xl font-bold text-gray-900 dark:text-white m-auto">
                            Expense Tahunan
                        </p>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3 dark:bg-gray-700 mb-5">
                    @php
                        $yearNow = date("Y");
                    @endphp
                    <form action="/expensetahunan/pdf" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                            <input autocomplete="off" value="{{$yearNow}}" min="2020" max="" type="number" id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('year')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-small">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <button type="submit" class="text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btn-loader">Export PDF Expense Tahunan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    let btnLoader = document.getElementById("btn-loader");

    function changeButtonText() {
    let buttonText = btnLoader.innerText;
    btnLoader.innerHTML = '<i class="fa-solid fa-spinner fa-spin-pulse fa-lg" style="color: #FFFFFF;"></i>';
    setTimeout(function() {
        btnLoader.innerHTML = buttonText;
    }, 3000);
    }
    btnLoader.addEventListener("click", changeButtonText);
</script>
