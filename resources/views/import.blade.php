<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <a href="/import-excel-database" class="text-4xl font-bold text-gray-900 m-auto text-center">
                            <h2>Import Excel ke Database</h2>
                        </a>
                    </div>
                    <hr class="h-1 bg-gray-100 rounded md:my-3">
                    <form action="/import/upload" method="GET" class="max-w-lg mx-auto">
                        @csrf
                        <label for="vehicle_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Excel <i class="fa-solid fa-asterisk fa-sm" style="color: #e02424;"></i></label>
                        <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="file_input" type="file" required>
                        <button type="submit" id="btn-loader" class="text-white duration-300 bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Import</button>
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