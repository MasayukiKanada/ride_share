<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約可能オファー一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="mb-6">{{ Auth::user()->name }}様</p>

                    @if ($offers->isEmpty())
                        <p>申し訳ございません。<br>予約できるオファーはありません。<br>入力内容を変更して再度お進みください。</p>
                        <form method="POST" action="{{ route('user.contracts.confirm') }}">
                            @csrf
                            <div class="mt-4">
                                <input type="hidden" id="req_date" name="req_date" value="{{ $inputs['req_date'] }}">
                                <input type="hidden" id="req_on_place" name="req_on_place" value="{{ $inputs['req_on_place'] }}">
                                    <input type="hidden" id="req_on_time" name="req_on_time" value="{{ $inputs['req_on_time'] }}">
                                    <input type="hidden" id="req_off_place" name="req_off_place" value="{{ $inputs['req_off_place'] }}">
                                    <input type="hidden" id="req_off_time" name="req_off_time" value="{{ $inputs['req_off_time'] }}">
                                    <input type="hidden" id="req_number" name="req_number" value="{{ $inputs['req_number'] }}">
                                <x-primary-button name="back">入力画面に戻る</x-primary-button>
                            </div>
                        </form>
                    @else
                    <p class="mb-6">ご予約可能なオファーよりご希望のものを選択ください。</p>
                    <form method="POST" action="{{ route('user.contracts.confirm') }}">
                        @csrf
                        <table class="w-full">
                            <tr class="border-b border-gray-400">
                                <th class="border-r border-gray-400 py-2">利用日</th>
                                <th class="border-r border-gray-400 py-2">下車地点のplus code</th>
                                <th class="border-r border-gray-400 py-2">車種</th>
                                <th class="border-r border-gray-400 py-2">乗車定員</th>
                                <th class="border-r border-gray-400 py-2">ドライバーズランク</th>
                                <th class="border-r border-gray-400 py-2">利用料金</th>
                                <th>選択</th>
                            </tr>
                            @foreach($offers as $offer)
                                <tr class="border-b border-gray-400">
                                    <input type="hidden" id="driver_id" name="driver_id" value="{{ $offer->driver_id }}">
                                    <input type="hidden" id="req_date" name="req_date" value="{{ $offer->offer_date }}">
                                    <input type="hidden" id="req_on_place" name="req_on_place" value="{{ $inputs['req_on_place'] }}">
                                    <input type="hidden" id="req_on_time" name="req_on_time" value="{{ $inputs['req_on_time'] }}">
                                    <input type="hidden" id="req_off_place" name="req_off_place" value="{{ $inputs['req_off_place'] }}">
                                    <input type="hidden" id="req_off_time" name="req_off_time" value="{{ $inputs['req_off_time'] }}">
                                    <input type="hidden" id="req_number" name="req_number" value="{{ $inputs['req_number'] }}">
                                    <!---ランク代入---->
                                    <input type="hidden" id="offer_fee" name="offer_fee" value="{{ $offer->offer_fee }}">
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_date }}</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $inputs['req_off_place'] }}</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_car }}</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_capacity }}名</td>
                                    <td class="border-r border-gray-400 px-2 py-2">ランク表示</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_fee }}円</td>
                                    <td class="text-center bg-indigo-600 font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 px-2 py-2"><button type="submit">選択する</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="mt-4">
                            <x-primary-button name="back">入力画面に戻る</x-primary-button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


