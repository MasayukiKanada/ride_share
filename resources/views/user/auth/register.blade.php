<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Tel -->
            <div class="mt-4">
                <x-input-label for="zip" :value="__('Tel')" />

                <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required />
            </div>

            <!-- Zip -->
            <div class="mt-4">
                <x-input-label for="zip" :value="__('Zip')" />

                <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required />
            </div>

            <!-- Pref -->
            <div class="mt-4">
                <x-input-label for="pref" :value="__('Pref')" />

                <x-text-input id="pref" class="block mt-1 w-full" type="text" name="pref" :value="old('pref')" required />
            </div>

            <!-- Town -->
            <div class="mt-4">
                <x-input-label for="town" :value="__('Town')" />

                <x-text-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />

                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-input-label for="birthday" :value="__('Birthday')" />

                <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required />
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />

                <x-select-box name="gender">
                    <option value="old('gender')" selected>性別を選択してください</option>
                    <option value="0">男性</option>
                    <option value="1">女性</option>
                    <option value="2">その他</option>
                </x-select-box>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
