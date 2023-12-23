<x-mail::message>
# オファー登録の完了

{{ $driver->name }}様

オファー登録を完了しましたのでお知らせします。
下記のオファー内容をご確認ください。

希望提供日：{{$offer->offer_date}}<br>
開始地点：<a class="text-blue-500" href="https://plus.codes/map/{{$offer->offer_on_place}}">{{$offer->offer_on_place}}</a><br>
開始時間：{{$offer->offer_on_time}}<br>
終了地点：<a class="text-blue-500" href="https://plus.codes/map/{{$offer->offer_off_place}}">{{$offer->offer_off_place}}</a><br>
終了時間：{{$offer->offer_off_time}}<br>
提供車種：{{$offer->offer_car}}<br>
乗車定員：{{$offer->offer_capacity}}<br>
希望提供料金（分／円）：{{$offer->offer_fee}}<br><br>

ご利用いただきましてありがとうございます。<br>
{{ config('app.name') }}

</x-mail::message>
