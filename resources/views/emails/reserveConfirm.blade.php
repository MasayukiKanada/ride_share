<x-mail::message>
# 予約完了

{{ $user->name }}様

利用予約を完了しましたのでお知らせします。<br>
下記の予約内容をご確認ください。

利用日：{{$contract->con_date}}<br>
乗車地点：<a class="text-blue-500" href="https://plus.codes/map/{{$contract->con_on_place}}">{{$contract->con_on_place}}</a><br>
乗車時間：{{$contract->con_on_time}}<br>
下車地点：<a class="text-blue-500" href="https://plus.codes/map/{{$contract->con_off_place}}">{{$contract->con_off_place}}</a><br>
下車時間：{{$contract->con_off_time}}<br>
利用人数：{{$contract->con_number}}<br>
利用車種：{{$contract->con_car}}<br>
ドライバーズランク：{{$contract->con_eva}}<br>
利用料金：{{$contract->con_fee}}円<br>

ご利用いただきましてありがとうございます。<br><br>
{{ config('app.name') }}

</x-mail::message>
