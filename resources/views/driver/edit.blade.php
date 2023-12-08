<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h2>ドライバー情報の更新</h2>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('driver.confirm') }}">
                        @csrf

                        @foreach($drivers as $driver)

                        <!-- ID -->
                        <input type="hidden" id="driver_id" name="driver_id" value="{{ auth()->id() }}">

                        <!-- 氏名 -->
                        <div class="mb-6">
                            <x-input-label for="name" :value="__('氏名')" />
                            <x-text-input id="name" class="block mt-1 w-3/4" type="text" name="name" :value="old('name', $driver->name)" required autofocus />
                        </div>

                        <!-- メールアドレス -->
                        <div class="mb-6">
                            <x-input-label for="email" :value="__('メールアドレス')" />
                            @if (isset($inputs['email']))
                                <x-text-input id="email" class="block mt-1 w-3/4" type="email" name="email" :value="old($driver->email, $inputs['email'])" required autofocus />
                            @else
                                <x-text-input id="email" class="block mt-1 w-3/4" type="email" name="email" :value="$driver->email" required autofocus />
                            @endif
                        </div>

                        <!-- 電話番号 -->
                        <div class="mb-6">
                            <x-input-label for="tel" :value="__('電話番号')" />
                            @if (isset($inputs['tel']))
                                <x-text-input id="tel" class="block mt-1 w-3/4" type="tel" name="tel" :value="old($driver->tel, $inputs['tel'])" required autofocus />
                            @else
                                <x-text-input id="tel" class="block mt-1 w-3/4" type="tel" name="tel" :value="$driver->tel" required autofocus />
                            @endif

                        </div>

                        <!-- 郵便番号 -->
                        <div class="mb-6">
                            <x-input-label for="zip" :value="__('郵便番号（ハイフン(ー)を除いた数字7桁）')" />
                            @if (isset($inputs['zip']))
                                <x-text-input id="zip" class="block mt-1 w-3/4" type="text" name="zip" :value="old($driver->zip, $inputs['zip'])" required autofocus />
                            @else
                                <x-text-input id="zip" class="block mt-1 w-3/4" type="text" name="zip" :value="$driver->zip" required autofocus />
                            @endif
                        </div>

                        <!-- 都道府県 -->
                        <div class="mb-6">
                            <x-input-label for="pref" :value="__('都道府県')" />
                            @if (isset($inputs['pref']))
                                <x-text-input id="pref" class="block mt-1 w-3/4" type="text" name="pref" :value="old($driver->pref, $inputs['pref'])" required autofocus />
                            @else
                                <x-text-input id="pref" class="block mt-1 w-3/4" type="text" name="pref" :value="$driver->pref" required autofocus />
                            @endif
                        </div>

                        <!-- 市区町村 -->
                        <div class="mb-6">
                            <x-input-label for="town" :value="__('市区町村')" />
                            @if (isset($inputs['town']))
                                <x-text-input id="town" class="block mt-1 w-3/4" type="text" name="town" :value="old($driver->town, $inputs['town'])" required autofocus />
                            @else
                                <x-text-input id="town" class="block mt-1 w-3/4" type="text" name="town" :value="$driver->town" required autofocus />
                            @endif
                        </div>

                        <!-- 丁目、番地、号以下住所 -->
                        <div class="mb-6">
                            <x-input-label for="address" :value="__('丁目、番地、号以下住所')" />
                            @if (isset($inputs['address']))
                                <x-text-input id="address" class="block mt-1 w-3/4" type="text" name="address" :value="old($driver->address, $inputs['address'])" required autofocus />
                            @else
                                <x-text-input id="address" class="block mt-1 w-3/4" type="text" name="address" :value="$driver->address" required autofocus />
                            @endif
                        </div>

                        <!-- 誕生日 -->
                        <div class="mb-6">
                            <x-input-label for="birthday" :value="__('誕生日')" />
                            @if (isset($inputs['birthday']))
                                <x-text-input id="birthday" class="block mt-1 w-3/4" type="date" name="birthday" :value="old($driver->birthday, $inputs['birthday'])" required autofocus />
                            @else
                                <x-text-input id="birthday" class="block mt-1 w-3/4" type="date" name="birthday" :value="$driver->birthday" required autofocus />
                            @endif
                        </div>

                        <!-- 性別 -->
                        <div class="mb-6">
                            <x-input-label for="gender" :value="__('性別')" />
                            @php
                                if ($driver->gender==0){$gender = '男性';}
                                elseif($driver->gender==1){$gender = '女性';}
                                else{$gender = 'その他';}
                            @endphp
                            @if (isset($inputs['gender']))
                                <x-text-input id="gender" class="block mt-1 w-3/4" type="text" name="gender" :value="old($gender, $inputs['gender'])" required autofocus />
                            @else
                                <x-text-input id="gender" class="block mt-1 w-3/4" type="text" name="gender" :value="$gender" required autofocus />
                            @endif
                        </div>

                        <!-- パスワード -->
                        <div class="mb-6">
                            <x-input-label for="password" :value="__('パスワード')" />
                            <div class="flex items-center">
                                <p class="block mt-1 w-3/4">******************</p>
                            </div>
                        </div>

                        @endforeach

                        <div class="mt-4">
                            <a href="{{ route('driver.show') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">戻る</a>
                        </div>
                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="submit" class="block w-1/3 md:w-1/4 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">更新内容を確認する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






