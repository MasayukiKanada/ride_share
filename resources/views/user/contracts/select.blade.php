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

                    <p>利用希望日:{{ $req_date }}</p>
                    {{-- <table>
                        <tr>
                            <th>利用日</th>
                            <th>目的地</th>
                            <th>詳細</th>
                        </tr>
                        @foreach($offers as $offer)
                                    <tr>
                                        <td>{{ $offer->offer_date }}</td>
                                        <td>{{ $offer->offer_off_place }}</td>
                                        <td><a href="">詳細</a></td>
                                    </tr>
                        @endforeach
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


