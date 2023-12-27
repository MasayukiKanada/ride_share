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

                    <div class="progressbar driver mb-10 hidden sm:flex">
                        <div class="item">STEP.1<br>オファー内容の入力</div>
                        <div class="item">STEP.2<br>オファー内容の確認</div>
                        <div class="item active">STEP.3<br>完了</div>
                    </div>
                    <div class="progressbar driver mb-10 sm:hidden">
                        <div class="item">STEP.1<br>入力</div>
                        <div class="item">STEP.2<br>確認</div>
                        <div class="item active">STEP.3<br>完了</div>
                    </div>

                        <p class="max-w-2xl text-sm text-gray-500">オファー登録が完了しました。</p>
                        <p class="max-w-2xl text-sm text-gray-500">なお、オファー完了メールがご登録のメールアドレス宛に送信されます。<br>内容をご確認ください。</p>
                    @endif
                    @if ($status == 'offer-destroyed')
                        <p class="max-w-2xl text-sm text-gray-500">オファーの取り消しが完了しました。</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('driver.offers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">成約前オファー履歴に戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
