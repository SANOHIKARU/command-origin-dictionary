@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -Create Category-')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>Category登録・編集</h2>

        <form method="POST" action="{{  route('category.store')  }}">
            <div class="form-group">
                <label>カテゴリー名</label>
                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="カテゴリー名を入力して下さい"  autofocus>
            </div>

            <input type="submit" class="btn btn-primary btn-sm" value="送信">

            {{--CSRFトークンが生成される--}}
            {{ csrf_field() }}
        </form>
    </div>
</div>





@endsection