<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h2>予約内容確認</h2>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="mb-6">{{ Auth::user()->name }}様</p>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('user.contractsuser.contracts.store') }}">
                        @csrf

                        <!-- 送信用隠しデータ -->
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" id="driver_id" name="driver_id" value="{{  $inputs['driver_id'] }}">
                        <input type="hidden" id="req_date" name="req_date" value="{{  $inputs['req_date'] }}">
                        <input type="hidden" id="req_on_place" name="req_on_place" value="{{  $inputs['req_on_place'] }}">
                        <input type="hidden" id="req_on_time" name="req_on_time" value="{{  $inputs['req_on_time'] }}">
                        <input type="hidden" id="req_off_place" name="req_off_place" value="{{  $inputs['req_off_place'] }}">
                        <input type="hidden" id="req_off_time" name="req_off_time" value="{{  $inputs['req_off_time'] }}">
                        <input type="hidden" id="offer_fee" name="offer_fee" value="{{  $inputs['offer_fee'] }}">
                        <input type="hidden" id="req_number" name="req_number" value="{{  $inputs['req_number'] }}">

                        <!-- 表 -->
                        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                            <div class="border-t">
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">利用者名</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ Auth::user()->name }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">利用日</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['req_date'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車場所</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['req_on_place'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['req_on_time'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">下車場所</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['req_off_place'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">下車時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['req_off_time'] }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">利用人数</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['req_number'] }}名</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">利用料金</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $inputs['offer_fee'] }}円</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-primary-button name="back">候補一覧に戻る</x-primary-button>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit" class="block w-1/4 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">予約を確定する</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






