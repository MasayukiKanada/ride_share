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
                                        <dt class="text-sm font-medium">乗車地のplus code（<button id="modal-btn01" class="text-blue-500 hover:text-blue-200">plus codeとは？</button>）</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_on_place }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_on_time }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">下車地のplus code（<button id="modal-btn02" class="text-blue-500 hover:text-blue-200">plus codeとは？</button>）</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_off_place }}</dd>
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
                            <button class="close">閉じる</button>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                plus codeとは？
                            </h2>
                            <p class="text-sm mb-3">plus code は、番地と同じように使えるコードです。<br>住所代わりの簡略なコードとして使用できるほか、通常の住所だけでは絞り込めない具体的な地点の指定にも役立ちます。<br>たとえば同じ建物に入口が複数ある場合に、plus code を使えば入口も含めて指定できます。</p>
                            <p class="text-sm mb-3">plus code は緯度と経度に基づいています。<br>シンプルなグリッド方式のコードで、20 種類の英数字（混同しやすい「1」と「I」などをあらかじめ除外したもの）の組み合わせで表現されます。</p>
                            <p class="text-sm"><a class="text-blue-500 hover:text-blue-200" href="https://support.google.com/maps/answer/7047426?hl=ja&co=GENIE.Platform%3DDesktop#:~:text=plus%20code%20%E3%81%AF%E3%80%81%E7%95%AA%E5%9C%B0%E3%81%A8,%E5%90%AB%E3%82%81%E3%81%A6%E6%8C%87%E5%AE%9A%E3%81%A7%E3%81%8D%E3%81%BE%E3%81%99%E3%80%82" target="_blank">マップヘルプ</a>より</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


