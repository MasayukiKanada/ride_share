<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ダッシュボード') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-8 flex items-center justify-center">
                        <button class="w-2/3 md:w-1/2 lg:w-1/3 rounded-md bg-indigo-600 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <a class="block px-3 py-2" href="{{ route('user.contracts.create') }}">新規利用予約</a>
                        </p>
                    </div>
                    <div class="mb-8 flex items-center justify-center">
                        <button class="w-2/3 md:w-1/2 lg:w-1/3 rounded-md bg-indigo-600 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <a class="block px-3 py-2" href="{{ route('user.contracts.index') }}">予約履歴</a>
                        </button>
                    </div>
                    <div class="mb-8 flex items-center justify-center">
                        <button class="w-2/3 md:w-1/2 lg:w-1/3 rounded-md bg-gray-600 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <a class="block px-3 py-2" href="{{ route('user.show') }}">マイページ</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
