<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オファー内容詳細
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
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_date }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">開始地点</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_on_place }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">開始時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_on_time }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">開始場所</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_off_place }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">開始時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_off_time }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">提供車種</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_car }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車定員</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_capacity }}名</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">提供料金</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $offer->offer_fee }}円</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('driver.offers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">オファー履歴に戻る</a>
                    </div>
                    <!-----キャンセルボタンを表示------>
                    @if (date("Y-m-d")<$offer->offer_date)
                    <form id="delete_{{ $offer->id }}" method="POST" action="{{ route('driver.offers.destroy', [$offer->id]) }}">
                        @csrf
                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button data-id="{{ $offer->id }}" onclick="deletePost(this)" type="button" class="block w-1/4 rounded-md bg-pink-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">予約を取り消す</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <script>
        //削除時の確認メッセージ
        function deletePost(e){
            'use strict'
            if(confirm('本当に取り消していいですか？')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>


