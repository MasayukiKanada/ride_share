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
                                        <dt class="text-sm font-medium">利用日</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_date }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車場所</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_on_place }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">乗車時間</dt>
                                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $contract->con_on_time }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium">下車場所</dt>
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
                                        <dt class="text-sm font-medium">利用料金</dt>
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


