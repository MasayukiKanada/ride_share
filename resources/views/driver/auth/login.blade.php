<x-guest-layout>
    <x-auth-card>
        <h2 class="font-semibold mb-6">ドライバーログイン</h2>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('driver.login') }}">
            @csrf

            <!-- デモ用ログイン情報 -->
            <div class="mb-6 pl-3">
                <p class="mb-1 text-gray-500 font-medium">デモ用ログイン情報</p>
                <p class="mb-1 text-gray-500">メールアドレス：driver@sample.com</p>
                <p class="text-gray-500">パスワード：password123</p>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('メールアドレス')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を保存する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('driver.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('driver.password.request') }}">
                        {{ __('パスワードを忘れましたか?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('ログイン') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
