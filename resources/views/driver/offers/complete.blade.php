<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オファー登録完了
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    @if ($status == 'offer-stored')
                    <p class="max-w-2xl text-sm text-gray-500">オファー登録が完了しました。</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('driver.offers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">オファー履歴一覧に戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
