@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -Create Category-')
    
@section('content')

<h2>Category登録・編集</h2>
<form method="POST">
    カテゴリー名<br>
    <input name="name" value="" placeholder="カテゴリー名を入力して下さい。"><br><br>

    <input type="submit" value="送信">
    {{--CSRFトークンが生成される--}}
    {{ csrf_field() }}

</form>


@endsection