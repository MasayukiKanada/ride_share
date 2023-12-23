<x-mail::message>
# オファーの成約

{{ $driver->name }}様

オファーが成約しましたのでお知らせします。<br>
下記の成約内容をご確認ください。

提供日：{{$contract->con_date}}<br>
乗車地点：<a class="text-blue-500" href="https://plus.codes/map/{{$contract->con_on_place}}">{{$contract->con_on_place}}</a><br>
乗車時間：{{$contract->con_on_time}}<br>
下車地点：<a class="text-blue-500" href="https://plus.codes/map/{{$contract->con_off_place}}">{{$contract->con_off_place}}</a><br>
下車時間：{{$contract->con_off_time}}<br>
利用人数：{{$contract->con_number}}<br>
提供料金：{{$contract->con_fee}}円<br>

成約内容に基づいて利用者のお出迎えと送迎をお願い申し上げます。<br>
ご利用いただきましてありがとうございます。<br><br>
{{ config('app.name') }}

</x-mail::message>
