contracts<br>

@foreach($values as $value)
契約ID:{{ $value->id }}<br>
利用者ID:{{ $value->user_id }}<br>
運転手ID:{{ $value->driver_id }}<br>
乗車地:{{ $value->con_on_place }}<br>
@endforeach