<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex active:scale-95 
items-center px-4 py-2 bg-red-600 border rounded-[8px] hover:rounded-none font-semibold 
text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none 
focus:ring-2 focus:ring-red-500 focus:ring-offset-2 duration-300']) }}>
    {{ $slot }}
</button>
