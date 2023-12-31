<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            利用予約完了
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="px-4 py-5 sm:px-6">
                    @if ($status == 'contract-stored')

                    <div class="progressbar mb-6 hidden sm:flex">
                        <div class="item">STEP.1<br>予約内容の入力</div>
                        <div class="item">STEP.2<br>オファーから選択</div>
                        <div class="item">STEP.3<br>予約内容の確認</div>
                        <div class="item active">STEP.4<br>完了</div>
                    </div>
                    <div class="progressbar mb-10 sm:hidden">
                        <div class="item">STEP.1<br>入力</div>
                        <div class="item active">STEP.2<br>選択</div>
                        <div class="item">STEP.3<br>確認</div>
                        <div class="item active">STEP.4<br>完了</div>
                    </div>

                    <p class="mb-2 max-w-2xl text-sm text-gray-500">利用予約が完了しました。</p>
                    <p class="max-w-2xl text-sm text-gray-500">ご登録のメールアドレス宛に利用予約完了のメールが送信されます。<br>ご確認ください。</p>
                    @endif
                    @if ($status == 'contract-destroyed')
                    <p class="max-w-2xl text-sm text-gray-500">予約の取り消しが完了しました。</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('user.contracts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700">予約履歴に戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
