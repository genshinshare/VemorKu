<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex active:scale-95 items-center px-4 py-2 bg-blue-600 hover:bg-blue-900 border border-gray-300 rounded-[8px] hover:rounded-none font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 duration-300']) }}>
    {{ $slot }}
</button>
