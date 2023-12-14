<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            成約済オファー詳細
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="px-3 py-6">
                        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                            <div class="border-t">
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">提供日</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_date }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車地のplus code<a id="modal-btn01" class="bg-blue-500 ml-3 text-sm text-white hover:opacity-70 cursor-pointer rounded-md py-1 px-2">plus codeとは?</a></dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0"><a class="text-blue-600 hover:text-blue-300" target="_blank" href="https://plus.codes/map/{{ $contract->con_on_place }}">{{ $contract->con_on_place }}</a></dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_on_time }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">下車地のplus code<a id="modal-btn02" class="bg-blue-500 ml-3 text-sm text-white hover:opacity-70 cursor-pointer rounded-md py-1 px-2">plus codeとは?</a></dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0"><a class="text-blue-600 hover:text-blue-300" target="_blank" href="https://plus.codes/map/{{ $contract->con_off_place }}">{{ $contract->con_off_place }}</a></dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">下車時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_off_time }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">利用人数</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_number }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">提供料金</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_fee }}円</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">ランク</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">ランク</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
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
    </div>
</x-app-layout>


