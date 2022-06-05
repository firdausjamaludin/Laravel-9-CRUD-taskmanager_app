<!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    <a href="/login" class="text-sm text-gray-700 dark:text-gray-500">
        <x-jet-button class="ml-4">
            {{ __('Log in') }}
        </x-jet-button>
    </a>
    <a href="/register" class=" text-sm text-gray-700 dark:text-gray-500 ">
        <x-jet-button class="ml-4">
            {{ __('Register') }}
        </x-jet-button>
    </a>
</div> -->

<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <x-jet-validation-errors class="mb-4" />
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="mt-4">
                <x-jet-button class="block mt-1 w-full">
                    <p style="text-align: center; margin: auto;">Log In</p>
                </x-jet-button>
            </div>

            <!-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
        </form>
        <div class="flex items-center justify-center mt-2">
            <p class="text-sm text-gray-600 hover:text-gray-900">Don't have an account?</p>
        </div>
        <a class=" flex items-center justify-center ml-4 underline text-sm text-blue-600 hover:text-gray-900" href="/register">
            {{ __('Register') }}
        </a>
    </x-jet-authentication-card>

</x-guest-layout>