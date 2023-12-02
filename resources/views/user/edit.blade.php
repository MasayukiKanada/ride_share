<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h2>利用者情報の編集</h2>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf

                        @foreach($users as $user)
                        <!-- ID -->
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">

                        <!-- 氏名 -->
                        <div class="mb-6">
                            <x-input-label for="name" :value="__('氏名')" />
                            <x-text-input id="name" class="block mt-1 w-3/4" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                        </div>

                        <!-- メールアドレス -->
                        <div class="mb-6">
                            <x-input-label for="email" :value="__('メールアドレス')" />
                            <x-text-input id="email" class="block mt-1 w-3/4" type="email" name="email" :value="old('email', $user->email)" required autofocus />
                        </div>

                        <!-- 電話番号 -->
                        <div class="mb-6">
                            <x-input-label for="tel" :value="__('電話番号')" />
                            <x-text-input id="tel" class="block mt-1 w-3/4" type="tel" name="tel" :value="old('tel', $user->tel)" required autofocus />
                        </div>

                        <!-- 郵便番号 -->
                        <div class="mb-6">
                            <x-input-label for="zip" :value="__('郵便番号（ハイフン(ー)を除いた数字7桁）')" />
                            <x-text-input id="zip" class="block mt-1 w-3/4" type="text" name="zip" :value="old('zip', $user->zip)" required autofocus />
                        </div>

                        <!-- 住所 -->
                        <div class="mb-6">
                            <x-input-label for="address" :value="__('住所')" />
                            <x-text-input id="address" class="block mt-1 w-3/4" type="text" name="address" :value="old('address', $user->address)" required autofocus />
                        </div>

                        <!-- 誕生日 -->
                        <div class="mb-6">
                            <x-input-label for="birthday" :value="__('誕生日')" />
                            <x-text-input id="birthday" class="block mt-1 w-3/4" type="date" name="birthday" :value="old('birthday', $user->birthday)" required autofocus />
                        </div>

                        <!-- 性別 -->
                        <div class="mb-6">
                            <x-input-label for="gender" :value="__('性別')" />
                            @php
                                if ($user->gender==0){$gender = '男性';}
                                elseif($user->gender==1){$gender = '女性';}
                                else{$gender = 'その他';}
                            @endphp
                            <x-text-input id="gender" class="block mt-1 w-3/4" type="text" name="gender" :value="old('gender', $gender)" required autofocus />
                        </div>

                        <!-- パスワード -->
                        <div class="mb-6">
                            <x-input-label for="password" :value="__('パスワード')" />
                            <div class="flex items-center">
                                <x-text-input id="input_password" class="block mt-1 w-1/3 mr-3" type="password" name="password" :value="old('password', $user->password)" required autofocus />
                                <i id="eye" class="fa-solid fa-eye w-6 h-6 cursor-pointer"></i>
                            </div>
                        </div>

                        @endforeach

                        <div class="mt-4">
                            <a href="{{ route('user.show') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">戻る</a>
                        </div>
                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="submit" class="block w-1/3 md:w-1/4 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">編集を確認する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






