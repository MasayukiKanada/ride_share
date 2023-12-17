<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            更新内容の確認
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('driver.update') }}">
                        @csrf

                        <!-- 送信用隠しデータ -->
                        <input type="hidden" id="id" name="id" value="{{ auth()->id() }}">
                        <input type="hidden" id="email" name="email" value="{{  $inputs['email'] }}">
                        <input type="hidden" id="tel" name="tel" value="{{  $inputs['tel'] }}">
                        <input type="hidden" id="zip" name="zip" value="{{  $inputs['zip'] }}">
                        <input type="hidden" id="pref" name="pref" value="{{  $inputs['pref'] }}">
                        <input type="hidden" id="town" name="town" value="{{  $inputs['town'] }}">
                        <input type="hidden" id="address" name="address" value="{{  $inputs['address'] }}">
                        <input type="hidden" id="birthday" name="birthday" value="{{  $inputs['birthday'] }}">
                        <input type="hidden" id="gender" name="gender" value="{{  $inputs['gender'] }}">

                        <!-- 表 -->
                        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                            <div class="border-t">
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">氏名</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ Auth::user()->name }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">メールアドレス</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['email'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">電話番号</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['tel'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">郵便番号</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['zip'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">都道府県</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{  $inputs['pref'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">市区町村</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['town'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">丁目、番地、号以下住所</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['address'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">生年月日</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['birthday'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">性別</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['gender'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 flex items-center">
                                        <dt class="text-sm font-medium">パスワード</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">************</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-primary-button name="back">編集画面に戻る</x-primary-button>
                        </div>

                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="submit" class="block w-1/4 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">更新を確定する</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






