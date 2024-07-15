<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Masukkan email akun ' .config('app.name'). ' Anda, agar kami dapat kirim link verifikasi email untuk mereset password akun Anda') }}
    </div>

    <!-- Session Status -->

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
