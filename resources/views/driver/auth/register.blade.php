<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('driver.register') }}">
            @csrf

              <!-- Name -->
              <div>
                <x-input-label for="name" :value="__('氏名')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('メールアドレス')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Tel -->
            <div class="mt-4">
                <x-input-label for="tel" :value="__('電話番号')" />

                <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required />
            </div>

            <!-- Zip -->
            <div class="mt-4">
                <x-input-label for="zip" :value="__('郵便番号')" />

                <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required />
            </div>

            <!-- Pref -->
            <div class="mt-4">
                <x-input-label for="pref" :value="__('都道府県')" />

                <x-text-input id="pref" class="block mt-1 w-full" type="text" name="pref" :value="old('pref')" required />
            </div>

            <!-- Town -->
            <div class="mt-4">
                <x-input-label for="town" :value="__('市区町村')" />

                <x-text-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('丁目、番地、号以下')" />

                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-input-label for="birthday" :value="__('誕生日')" />

                <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required />
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('性別')" />

                <x-select-box name="gender">
                    <option value="old('gender')" selected>性別を選択してください</option>
                    <option value="0">男性</option>
                    <option value="1">女性</option>
                    <option value="2">その他</option>
                </x-select-box>
            </div>

            <!-- Driver licence -->
            <div class="mt-4">
                <x-input-label for="driver_licence" :value="__('免許証番号（数字12桁）')" />

                <x-text-input id="driver_licence" class="block mt-1 w-full" type="number" name="driver_licence" :value="old('driver_licence')" required />
            </div>

            <!-- Own car -->
            <div class="mt-4">
                <x-input-label for="own_car" :value="__('所有者種')" />

                <x-text-input id="own_car" class="block mt-1 w-full" type="text" name="own_car" :value="old('own_car')" required />
            </div>

            <!-- Own capacity -->
            <div class="mt-4">
                <x-input-label for="own_capacity" :value="__('乗車定員（人数）')" />

                <x-text-input id="own_capacity" class="block mt-1 w-full" type="number" name="own_capacity" :value="old('own_capacity')" required />
            </div>

            <!-- Accident -->
            <div class="mt-4">
                <x-input-label for="accident" :value="__('事故歴（回数）')" />

                <x-text-input id="accident" class="block mt-1 w-full" type="number" name="accident" :value="old('accident')" required />
            </div>

            <!-- Basic Fee -->
            <div class="mt-4">
                <x-input-label for="basic_fee" :value="__('基本料金（円）')" />

                <x-text-input id="basic_fee" class="block mt-1 w-full" type="number" name="basic_fee" :value="old('basic_fee')" required />
            </div>

            <!-- Bank Name -->
            <div class="mt-4">
                <x-input-label for="bank_name" :value="__('振込先銀行名')" />

                <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required />
            </div>

            <!-- Bank branch -->
            <div class="mt-4">
                <x-input-label for="bank_branch" :value="__('振込先支店名')" />

                <x-text-input id="bank_branch" class="block mt-1 w-full" type="text" name="bank_branch" :value="old('bank_branch')" required />
            </div>

            <!-- Bank account -->
            <div class="mt-4">
                <x-input-label for="bank_account" :value="__('振込先口座番号')" />

                <x-text-input id="bank_account" class="block mt-1 w-full" type="text" name="bank_account" :value="old('bank_account')" required />
            </div>

            <!-- Account name -->
            <div class="mt-4">
                <x-input-label for="account_name" :value="__('振込先口座名義人')" />

                <x-text-input id="account_name" class="block mt-1 w-full" type="text" name="account_name" :value="old('account_name')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('パスワードの確認')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('driver.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
