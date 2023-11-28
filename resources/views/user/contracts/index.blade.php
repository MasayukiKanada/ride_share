<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            利用履歴一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="mb-6">{{ Auth::user()->name }}様</p>

                    <!------利用前履歴と利用済履歴で表示を変える-------->

                    <!-----利用前履歴------>
                    <div class="bg-red-100 px-3 py-6">
                        <h3 class="text-lg text-zinc-600 font-semibold">利用前履歴</h3>
                        @if ($before_cons->isEmpty())
                            <p>利用前の履歴はありません。</p>
                        @else
                            <table>
                                <tr>
                                    <th>利用日</th>
                                    <th>目的地</th>
                                    <th>詳細</th>
                                </tr>
                                <tr class="border-b border-gray-400">
                                    <th class="border-r border-gray-400 py-2">利用日</th>
                                    <th class="border-r border-gray-400 py-2">目的地</th>
                                    <th>詳細</th>
                                </tr>
                                @foreach($before_cons as $before_con)
                                            <tr class="border-b border-gray-400">
                                                <td class="border-r border-gray-400 px-2 py-2">{{ $before_con->con_date }}</td>
                                                <td class="border-r border-gray-400 px-2 py-2">{{ $before_con->con_off_place }}</td>
                                                <td class="text-center bg-indigo-600 font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a class="block px-2 py-2" href="">詳細を見る</a></td>
                                            </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>


                    <!-----利用済履歴------>
                    <div class="bg-gray-100 px-3 py-6">
                        <h3 class="text-lg text-zinc-600 font-semibold">利用済履歴</h3>
                        @if ($after_cons->isEmpty())
                            <p>利用済の履歴はありません。</p>
                        @else
                            <table>
                                <tr>
                                    <th>利用日</th>
                                    <th>目的地</th>
                                    <th>詳細</th>
                                </tr>
                                @foreach($after_cons as $after_con)
                                            <tr>
                                                <td>{{ $after_con->con_date }}</td>
                                                <td>{{ $after_con->con_off_place }}</td>
                                                <td><a href="">詳細</a></td>
                                            </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


