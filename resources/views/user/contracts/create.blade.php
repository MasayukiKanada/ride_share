<h2>新規予約</h2>

<form method="post" action="">
    <input type="hidden" id="user_id" name="user_id" value="{{ request()->query('user_id') }}">

    <label for="name">利用日</label>
    <input type="text" id="name" name="name">

    <label for="name">乗車場所</label>
    <input type="text" id="name" name="name">

    <label for="name">乗車時間</label>
    <input type="text" id="name" name="name">

    <label for="name">下車場所</label>
    <input type="text" id="name" name="name">

    <label for="name">利用人数</label>
    <input type="text" id="name" name="name">
</form>



