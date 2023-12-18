<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('ご登録ありがとうございます！ ご利用前に、こちらの「認証用メールを送る」をクリックして、ご登録のメールアドレスに届くメールよりメールアドレスの認証を行ってください。届かない場合、再度リンクをクリックしてください。') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('ご登録のメールアドレス宛に認証用メールをお送りしました。') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('driver.verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('認証用メールを送る') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('driver.logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('ログアウト') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
