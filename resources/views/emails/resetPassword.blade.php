<x-mail::message>
# パスワードリセット

こちらからパスワードのリセットを行ってください。

<x-mail::button :url="$url">
パスワードのリセット
</x-mail::button>

ご利用いただきましてありがとうございます。<br>
{{ config('app.name') }}

</x-mail::message>
