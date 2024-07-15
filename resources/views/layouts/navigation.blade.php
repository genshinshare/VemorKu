<!-- Primary Navigation Menu -->
<div class="max-w-7xl mx-auto px-4 px-6 px-8"> <!-- md:px-6 md:px-8 -->
    <div class="flex justify-between h-16">
        <div class="flex items-center justify-start rtl:justify-end">
            <!-- Hamburger -->
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation" type="button" class="inline-flex duration-300 items-center p-2 text-sm text-white rounded-[22px] bg-blue-600 hover:rounded-md hover:bg-blue-900 active:scale-95">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
             </button>
            <!-- Logo -->
            <div class="shrink-0 flex items-center ml-5">
                <a href="{{ route('dashboard') }}" class="active:scale-95 transition duration-150">
                    <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('logo-brand.png') }}" alt="logoAltrak1978">
                </a>
            </div>
        </div>
        <!-- Settings Dropdown -->
        <div class="mt-3 ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profil') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('petunjuk')" target="_blank">
                        {{ __('Petunjuk') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>
