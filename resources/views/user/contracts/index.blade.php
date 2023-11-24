<h2>利用履歴一覧</h2>
<!------利用前履歴と利用済履歴で表示を変える-------->

<!-----利用前履歴------>
<h2>利用前履歴</h2>
@if ($before_cons->isEmpty())
    <p>利用前の履歴はありません。</p>
@else
    <table>
        <tr>
            <th>利用日</th>
            <th>目的地</th>
            <th>詳細</th>
        </tr>
        @foreach($before_cons as $before_con)
                    <tr>
                        <td>利用日:{{ $before_con->con_date }}</td>
                        <td>目的地:{{ $before_con->con_off_place }}</td>
                        <td><a href="">詳細</a></td>
                    </tr>
        @endforeach
    </table>
@endif


<!-----利用済履歴------>
<h2>利用済履歴</h2>
@if ($after_cons->isEmpty())
    <p>利用済の履歴はありません。</p>
@else
    <table>
        <tr>
            <th>利用日</th>
            <th>目的地</th>
            <th>詳細</th>
        </tr>
        @foreach($after_cons as $after_con)
                    <tr>
                        <td>利用日:{{ $after_con->con_date }}</td>
                        <td>目的地:{{ $after_con->con_off_place }}</td>
                        <td><a href="">詳細</a></td>
                    </tr>
        @endforeach
    </table>
@endif




