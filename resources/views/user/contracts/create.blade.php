<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規利用予約
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="progressbar mb-10 hidden sm:flex">
                        <div class="item active">STEP.1<br>予約内容の入力</div>
                        <div class="item">STEP.2<br>オファーから選択</div>
                        <div class="item">STEP.3<br>予約内容の確認</div>
                        <div class="item">STEP.4<br>完了</div>
                    </div>
                    <div class="progressbar mb-10 sm:hidden">
                        <div class="item active">STEP.1<br>入力</div>
                        <div class="item">STEP.2<br>選択</div>
                        <div class="item">STEP.3<br>確認</div>
                        <div class="item">STEP.4<br>完了</div>
                    </div>

                    <p class="mb-6">{{ Auth::user()->name }}様</p>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('user.contracts.select') }}">
                        @csrf

                        <!-- ID -->
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">

                        <!-- 利用日 -->
                        <div class="mb-6">
                            <x-input-label for="req_date" :value="__('希望利用日')" />
                            @if (isset($inputs['req_date']))
                                <x-text-input id="req_date" class="block mt-1 w-full" type="date" name="req_date" :value="old('req_date', $inputs['req_date'])" required autofocus />
                            @else
                                <x-text-input id="req_date" class="block mt-1 w-full" type="date" name="req_date" :value="old('req_date', $defaultDate)" required autofocus />
                            @endif

                        </div>

                        <!-- 乗車場所 -->
                        <div class="mb-6">
                            <div class="flex items-center">
                                <x-input-label for="req_on_place" :value="__('希望乗車地のplus code')" />
                                <a id="modal-btn01" class="bg-blue-500 ml-3 text-sm text-white hover:opacity-70 cursor-pointer rounded-md py-1 px-2">plus codeとは?</a>
                            </div>

                            <div class="flex">
                                @if (isset($inputs['req_on_place']))
                                    <x-text-input id="req_on_place" class="block mt-1 w-3/4" type="text" name="req_on_place" :value="old('req_on_place', $inputs['req_on_place'])" required autofocus />
                                @else
                                    <x-text-input id="req_on_place" class="block mt-1 w-3/4" type="text" name="req_on_place" :value="old('req_on_place', $user->pref.$user->town.$user->address)" required autofocus />
                                @endif
                                    <a target="_blank" class="block mt-1 w-1/4 ml-3 text-center rounded-md py-3 bg-green-600 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="https://plus.codes/map/{{ $user->pref.$user->town.$user->address }}">地図から取得</a>
                            </div>
                        </div>

                        <!-- 乗車時間 -->
                        <div class="mb-6">
                            <x-input-label for="req_on_time" :value="__('希望乗車時間')" />

                            @if (isset($inputs['req_on_time']))
                                <x-text-input id="req_on_time" class="block mt-1 w-full" type="time" name="req_on_time" :value="old('req_on_time', $inputs['req_on_time'])" required autofocus />
                            @else
                                <x-text-input id="req_on_time" class="block mt-1 w-full" type="time" name="req_on_time" :value="old('req_on_time')" required autofocus />
                            @endif

                        </div>

                        <!-- 下車場所 -->
                        <div class="mb-6">
                            <div class="flex items-center">
                                <x-input-label for="req_off_place" :value="__('希望下車地のplus code')" />
                                <a id="modal-btn02" class="bg-blue-500 ml-3 text-sm text-white hover:opacity-70 cursor-pointer rounded-md py-1 px-2">plus codeとは?</a>
                            </div>

                            <div class="flex">
                                @if (isset($inputs['req_off_place']))
                                    <x-text-input id="req_off_place" class="block mt-1 w-3/4" type="text" name="req_off_place" :value="old('req_off_place', $inputs['req_off_place'])" required autofocus />
                                @else
                                    <x-text-input id="req_off_place" class="block mt-1 w-3/4" type="text" name="req_off_place" :value="old('req_off_place', $user->pref.$user->town.$user->address)" required autofocus />
                                @endif
                                    <a target="_blank" class="block mt-1 w-1/4 ml-3 text-center rounded-md py-3 bg-green-600 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="https://plus.codes/map/{{ $user->pref.$user->town.$user->address }}">地図から取得</a>
                            </div>
                        </div>

                        <!-- 下車時間 -->
                        <div class="mb-6">
                            <x-input-label for="req_off_time" :value="__('下車時間目安')" />

                            @if (isset($inputs['req_off_time']))
                                <x-text-input id="req_off_time" class="block mt-1 w-full" type="time" name="req_off_time" :value="old('req_off_time', $inputs['req_off_time'])" required autofocus />
                            @else
                                <x-text-input id="req_off_time" class="block mt-1 w-full" type="time" name="req_off_time" :value="old('req_off_time')" required autofocus />
                            @endif
                        </div>

                        <!-- 利用人数 -->
                        <div class="mb-6">
                            <x-input-label for="req_number" :value="__('希望利用人数')" />

                            @if (isset($inputs['req_number']))
                                <x-text-input id="req_number" class="block mt-1 w-full" type="number" name="req_number" :value="old('req_number', $inputs['req_number'])" required autofocus />
                            @else
                                <x-text-input id="req_number" class="block mt-1 w-full" type="number" name="req_number" :value="old('req_number')" required autofocus />
                            @endif

                        </div>
                        <div class="mt-4">
                            <a href="/dashboard" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">戻る</a>
                        </div>
                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="submit" class="block w-1/3 md:w-1/4 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">候補を選択する</button>
                        </div>
                    </form>
                </div>
                <div class="modal-overlay">
                    <div class="modal-window">
                        <button class="close" aria-label="閉じる"></button>
                        <div class="mb-8">
                            <h2 class="pb-3 border-b border-black mb-5 font-semibold text-xl text-gray-800 leading-tight">
                                plus codeとは？
                            </h2>
                            <p class="text-sm mb-3">plus code は、番地と同じように使えるコードです。<br>住所代わりの簡略なコードとして使用できるほか、通常の住所だけでは絞り込めない具体的な地点の指定にも役立ちます。<br>たとえば同じ建物に入口が複数ある場合に、plus code を使えばどの入口かを指定できます。</p>
                            <p class="text-sm mb-3">plus code は緯度と経度に基づいています。<br>シンプルなグリッド方式のコードで、20 種類の英数字（混同しやすい「1」と「I」などをあらかじめ除外したもの）の組み合わせで表現されます。</p>
                            <p class="text-sm"><a class="text-blue-500 hover:text-blue-200" href="https://support.google.com/maps/answer/7047426?hl=ja&co=GENIE.Platform%3DDesktop#:~:text=plus%20code%20%E3%81%AF%E3%80%81%E7%95%AA%E5%9C%B0%E3%81%A8,%E5%90%AB%E3%82%81%E3%81%A6%E6%8C%87%E5%AE%9A%E3%81%A7%E3%81%8D%E3%81%BE%E3%81%99%E3%80%82" target="_blank">Googleマップヘルプ</a>より</p>
                        </div>
                        <div class="mb-5">
                            <h2 class="pb-3 mb-3 font-semibold text-lg text-gray-800 leading-tight">
                                plus codeを取得する方法
                            </h2>
                            <p class="text-sm mb-1">1. [地図から取得]をタップすると、<img class="inline-block h-6 w-6" src="{{ asset('storage/images/pluscode_logo.png') }}"> Plus codes の地図画面に移ります。</p>
                            <p class="text-sm mb-1">2. 地図画面上でドラッグして指定したい地点をタップします。</p>
                            <p class="text-sm mb-1">3.画面下部に表示されるパネル内にある <strong class="text-red-500">plus code (20種類の英数字混在コード)から現在地の都市名まで</strong>(下画像の赤枠箇所)をコピーします。</p>
                            <p class="text-sm mb-3">4.コピーした plus code を入力欄に貼り付けると、その場所を共有できます。</p>
                            <img class="w-2/3 max-w-md" src="{{ asset('storage/images/pluscode_howto.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






