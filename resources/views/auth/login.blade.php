
<x-guest-layout>
    <div class="flex justify-center my-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20">
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if (session('message'))
                <div class="alert alert-{{ session('status') }} bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 011.415 0c.39.39.39 1.023 0 1.415L11.414 11l4.348 4.348a1 1 0 01-1.415 1.415L10 12.414l-4.348 4.348a1 1 0 01-1.415-1.415L8.586 11 4.348 6.652a1 1 0 011.415-1.415L10 9.586l4.348-4.348z"/></svg>
                    </button>
                </div>
            @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
