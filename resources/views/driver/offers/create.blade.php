<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規オファー
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="progressbar driver mb-10">
                        <div class="item active">STEP.1<br>オファー内容の入力</div>
                        <div class="item">STEP.2<br>オファー内容の確認</div>
                        <div class="item">STEP.3<br>完了</div>
                    </div>

                    <p class="mb-6">{{ Auth::user()->name }}様</p>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('driver.offers.confirm') }}">
                        @csrf

                        <!-- ID -->
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">

                        <!-- 提供日 -->
                        <div class="mb-6">
                            <x-input-label for="offer_date" :value="__('希望提供日')" />
                            @if (isset($inputs['offer_date']))
                                <x-text-input id="offer_date" class="block mt-1 w-full" type="date" name="offer_date" :value="old('offer_date', $inputs['offer_date'])" required autofocus />
                            @else
                                <x-text-input id="offer_date" class="block mt-1 w-full" type="date" name="offer_date" :value="old('offer_date', $defaultDate)" required autofocus />
                            @endif

                        </div>

                        <!-- 開始地点 -->
                        <div class="mb-6">
                            <x-input-label for="offer_on_place" :value="__('開始地点')" />

                            <div class="flex">
                                @if (isset($inputs['offer_on_place']))
                                    <x-text-input id="offer_on_place" class="block mt-1 w-3/4" type="text" name="offer_on_place" :value="old('offer_on_place', $inputs['offer_on_place'])" required autofocus />
                                @else
                                    <x-text-input id="offer_on_place" class="block mt-1 w-3/4" type="text" name="offer_on_place" :value="old('offer_on_place', $user->pref.$user->town.$user->address)" required autofocus />
                                @endif
                                    <a target="_blank" class="block mt-1 w-1/4 ml-3 text-center rounded-md py-3 bg-green-600 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="https://www.google.com/maps/place/{{ $user->pref.$user->town.$user->address }}">地図から探す</a>
                            </div>
                        </div>

                        <!-- 開始時間 -->
                        <div class="mb-6">
                            <x-input-label for="offer_on_time" :value="__('開始時間')" />

                            @if (isset($inputs['offer_on_time']))
                                <x-text-input id="offer_on_time" class="block mt-1 w-full" type="time" name="offer_on_time" :value="old('offer_on_time', $inputs['offer_on_time'])" required autofocus />
                            @else
                                <x-text-input id="offer_on_time" class="block mt-1 w-full" type="time" name="offer_on_time" :value="old('offer_on_time')" required autofocus />
                            @endif

                        </div>

                        <!-- 終了地点 -->
                        <div class="mb-6">
                            <x-input-label for="offer_off_place" :value="__('終了地点')" />

                            <div class="flex">
                                @if (isset($inputs['offer_off_place']))
                                    <x-text-input id="offer_off_place" class="block mt-1 w-3/4" type="text" name="offer_off_place" :value="old('offer_off_place', $inputs['offer_off_place'])" required autofocus />
                                @else
                                    <x-text-input id="offer_off_place" class="block mt-1 w-3/4" type="text" name="offer_off_place" :value="old('offer_off_place', $user->pref.$user->town.$user->address)" required autofocus />
                                @endif
                                    <a target="_blank" class="block mt-1 w-1/4 ml-3 text-center rounded-md py-3 bg-green-600 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="https://www.google.com/maps/place/{{ $user->pref.$user->town.$user->address }}">地図から探す</a>
                            </div>
                        </div>

                        <!-- 終了時間 -->
                        <div class="mb-6">
                            <x-input-label for="offer_off_time" :value="__('終了時間')" />

                            @if (isset($inputs['offer_off_time']))
                                <x-text-input id="offer_off_time" class="block mt-1 w-full" type="time" name="offer_off_time" :value="old('offer_off_time', $inputs['offer_off_time'])" required autofocus />
                            @else
                                <x-text-input id="offer_off_time" class="block mt-1 w-full" type="time" name="offer_off_time" :value="old('offer_off_time')" required autofocus />
                            @endif
                        </div>

                        <!-- 提供車種 -->
                        <div class="mb-6">
                            <x-input-label for="offer_car" :value="__('提供車種')" />

                            @if (isset($inputs['offer_car']))
                                <x-text-input id="offer_car" class="block mt-1 w-full" type="text" name="offer_car" :value="old('offer_car', $inputs['offer_car'])" required autofocus />
                            @else
                                <x-text-input id="offer_car" class="block mt-1 w-full" type="text" name="offer_car" :value="old('offer_car')" required autofocus />
                            @endif
                        </div>

                        <div class="flexbox flex">
                            <!-- 乗車定員 -->
                            <div class="mb-6 w-full mr-3">
                                <x-input-label for="offer_capacity" :value="__('乗車定員（人数）')" />

                                @if (isset($inputs['offer_capacity']))
                                    <x-text-input id="offer_capacity" class="block mt-1 w-full" type="number" name="offer_capacity" :value="old('offer_capacity', $inputs['offer_capacity'])" required autofocus />
                                @else
                                    <x-text-input id="offer_capacity" class="block mt-1 w-full" type="number" name="offer_capacity" :value="old('offer_capacity')" required autofocus />
                                @endif
                            </div>

                            <!-- 希望提供料金 -->
                            <div class="mb-6 w-full ml-3">
                                <x-input-label for="offer_fee" :value="__('希望提供料金（円／分）')" />

                                @if (isset($inputs['offer_fee']))
                                    <x-text-input id="offer_fee" class="block mt-1 w-full" type="number" name="offer_fee" :value="old('offer_fee', $inputs['offer_fee'])" required autofocus />
                                @else
                                    <x-text-input id="offer_fee" class="block mt-1 w-full" type="number" name="offer_fee" :value="old('offer_fee')" required autofocus />
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="/driver/dashboard" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">戻る</a>
                        </div>
                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="submit" class="block w-1/3 md:w-1/4 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">オファー内容を確認する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






