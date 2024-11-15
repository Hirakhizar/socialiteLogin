<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

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

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>


        <div class="flex items-center justify-between mt-4">

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('auth.redirection','google') }}" class="inline-flex items-center px-4 py-2 border border-red-500 text-black-500 hover:bg-red-500 hover:text-white font-medium rounded-md shadow-sm transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 48 48"><path d="M44.5 20H24v8.5h11.7c-1.3 4-5.1 7.5-11.7 7.5-7 0-12.5-5.7-12.5-12.5S17 11 24 11c3.1 0 5.8 1.1 8 3l6-6C34.7 4.7 29.8 3 24 3 12.9 3 4 11.9 4 23s8.9 20 20 20c10.2 0 18.7-7.3 18.7-17.8 0-1.2-.2-2.2-.5-3.2z" fill="#f44336"/><path d="M6 14.7l6.6 4.8c1.7-3.3 4.7-5.8 8.5-6.9L19 8.2C14.2 9.8 10.2 12.9 6 14.7z" fill="#fdd835"/><path d="M24 3c-4.7 0-9 1.5-12.5 4L6 14.7c2.1-4.5 5.6-8.4 10-10.7L24 3z" fill="#f4b400"/><path d="M24 3v8.5c4 0 7.8 1.5 10.7 4L44.5 8C39.9 4.7 32.5 3 24 3z" fill="#4285f4"/><path d="M44.5 20H24v8.5h11.7c-.7 2-1.8 3.8-3.1 5.3l6 5c2.8-3.1 4.9-7.3 5.9-11.8.5-2 .8-4 .8-6.2V20z" fill="#0f9d58"/></svg>
                Login with Google
            </a>
            
<!-- Login with Facebook -->
<a href="{{ route('auth.redirection','facebook') }}" class="inline-flex items-center px-4 py-2 border border-blue-600 text-black-500 hover:bg-blue-600 hover:text-white font-medium rounded-md shadow-sm transition-colors duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 48 48">
        <!-- SVG for Facebook logo -->
        <path d="M24 1C11.2 1 1 11.2 1 24c0 11.6 8.8 21.2 20 23.7V30.8h-5.7v-6.8h5.7v-4.9c0-5.7 3.4-8.9 8.6-8.9 2.5 0 5 .4 5 .4v5.5h-2.8c-2.8 0-3.7 1.8-3.7 3.6v4.3h6.4l-1 6.8h-5.4V48C39.2 45.2 47 35.5 47 24 47 11.2 36.8 1 24 1z" fill="#1877f2"/>
        <path d="M33.8 24l1-6.8h-6.4v-4.3c0-1.8.9-3.6 3.7-3.6h2.8V4.8s-2.5-.4-5-.4c-5.2 0-8.6 3.2-8.6 8.9v4.9h-5.7v6.8h5.7V48c1.3.1 2.6.1 4 .1 8.4 0 15.7-4.1 20-10.3V24h-6.4z" fill="#ffffff"/>
    </svg>
    Login with Facebook
</a>

<!-- Login with GitHub -->
<a href="{{ route('auth.redirection','github') }}" class="inline-flex items-center px-4 py-2 border border-gray-800 text-black-500 hover:bg-gray-800 hover:text-white font-medium rounded-md shadow-sm transition-colors duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24">
        <!-- SVG for GitHub logo -->
        <path d="M12 .5C5.7.5.5 5.7.5 12c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6V20c-3.2.7-3.9-1.4-3.9-1.4-.5-1.2-1.3-1.5-1.3-1.5-1-.7.1-.7.1-.7 1.2.1 1.9 1.2 1.9 1.2 1 .1 1.5-.8 1.5-.8.2-1 .7-1.2.9-1.3-2.5-.3-5-1.2-5-5.4 0-1.2.5-2.2 1.2-3-.1-.3-.5-1.3.1-2.7 0 0 1-.3 3.3 1.3a11.4 11.4 0 0 1 6 0c2.3-1.6 3.3-1.3 3.3-1.3.6 1.4.2 2.4.1 2.7.7.8 1.2 1.8 1.2 3 0 4.2-2.5 5.1-5 5.4.4.3.7.8.7 1.5v2.2c0 .3.2.7.8.6a10.5 10.5 0 0 0 7.8-10.9c0-6.3-5.2-11.5-11.5-11.5z" fill="#181717"/>
    </svg>
    Login with GitHub
</a>
        </div>
    </form>
</x-guest-layout>
