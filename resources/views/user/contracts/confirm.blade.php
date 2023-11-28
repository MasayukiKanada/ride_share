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

                    <form method="POST" action="{{ route('user.contractsuser.contracts.select') }}">
                        @csrf

                        <!-- ID -->
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">

                        <!-- 利用日 -->
                        <div class="mb-6">
                            <x-input-label for="req_date" :value="__('希望利用日')" />

                            <x-text-input id="req_date" class="block mt-1 w-full" type="date" name="con_date" value="{{ $con_date }}" required autofocus />
                        </div>

                        <!-- 乗車場所 -->
                        <div class="mb-6">
                            <x-input-label for="req_on_place" :value="__('希望乗車場所')" />

                            <div class="flex">
                                <x-text-input id="req_on_place" class="block mt-1 w-3/4" type="text" name="req_on_place" value="{{ $con_on_place }}" required autofocus />
                            </div>
                        </div>

                        <!-- 乗車時間 -->
                        <div class="mb-6">
                            <x-input-label for="req_on_time" :value="__('希望乗車時間')" />

                            <x-text-input id="req_on_time" class="block mt-1 w-full" type="time" name="req_on_time" value="{{ $con_on_time }}" required autofocus />
                        </div>

                        <!-- 下車場所 -->
                        <div class="mb-6">
                            <x-input-label for="req_off_place" :value="__('希望下車場所')" />

                            <div class="flex">
                                <x-text-input id="req_off_place" class="block mt-1 w-3/4" type="text" name="req_off_place" value="{{ $con_off_place }}" required autofocus />
                            </div>
                        </div>

                        <!-- 下車時間 -->
                        <div class="mb-6">
                            <x-input-label for="req_off_time" :value="__('下車時間目安')" />

                            <x-text-input id="req_off_time" class="block mt-1 w-full" type="time" name="req_off_time" value="{{ $con_off_time }})" required autofocus />
                        </div>

                        <!-- 利用人数 -->
                        <div class="mb-6">
                            <x-input-label for="req_number" :value="__('希望利用人数')" />

                            <x-text-input id="req_number" class="block mt-1 w-full" type="number" name="req_number" value="{{ $con_number }}" required autofocus />
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






