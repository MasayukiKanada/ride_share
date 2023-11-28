<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約候補一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="mb-6">{{ Auth::user()->name }}様</p>

                    @if ($offers->isEmpty())
                        <p>申し訳ございません。<br>利用できる候補はありません。</p>
                    @else
                    <form method="POST" action="{{ route('user.contractsuser.contracts.confirm') }}">
                        @csrf
                        <table class="w-full">
                            <tr class="border-b border-gray-400">
                                <th class="border-r border-gray-400 py-2">利用日</th>
                                <th class="border-r border-gray-400 py-2">目的地</th>
                                <th class="border-r border-gray-400 py-2">車種</th>
                                <th class="border-r border-gray-400 py-2">乗車定員</th>
                                <th class="border-r border-gray-400 py-2">ランク</th>
                                <th class="border-r border-gray-400 py-2">利用料金</th>
                                <th>選択</th>
                            </tr>
                            @foreach($offers as $offer)
                                <tr class="border-b border-gray-400">
                                    <input type="hidden" id="driver_id" name="driver_id" value="{{ $offer->driver_id }}">
                                    <input type="hidden" id="con_date" name="con_date" value="{{ $offer->offer_date }}">
                                    <input type="hidden" id="con_on_place" name="con_on_place" value="{{ $req_on_place }}">
                                    <input type="hidden" id="con_on_time" name="con_on_time" value="{{ $req_on_time }}">
                                    <input type="hidden" id="con_off_place" name="con_off_place" value="{{ $req_off_place }}">
                                    <input type="hidden" id="con_off_time" name="con_off_time" value="{{ $req_off_time }}">
                                    <input type="hidden" id="con_number" name="con_number" value="{{ $req_number }}">
                                    <!---ランク代入---->
                                    <input type="hidden" id="con_fee" name="con_fee" value="{{ $offer->offer_fee }}">
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_date }}</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $req_off_place }}</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_car }}</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_capacity }}名</td>
                                    <td class="border-r border-gray-400 px-2 py-2">ランク表示</td>
                                    <td class="border-r border-gray-400 px-2 py-2">{{ $offer->offer_fee }}円</td>
                                    <td class="text-center bg-indigo-600 font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><button type="submit" class="block px-2 py-2">選択する</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


