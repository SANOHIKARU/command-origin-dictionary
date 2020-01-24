@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -Create Category-')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>Category登録・編集</h2>
        
        {{--if 文による条件分岐--}}
        @if (session('message'))
        <div class="alert alert-success">
            {{--セッションヘルパーを使ってキーを指定して、セッションに保存されたデータを取り出す--}}
            {{ session('message') }}
        </div>
        <br>
        @endif

        {{--$errors は Illuminate\Support\MessageBag インスタンスで、エラーメッセージの操作に便利なメソッドを使うことができる--}}
        {{--バリデートエラーがあった場合は、自動的にエラー内容・メッセージが保存された状態で、元のアドレスにリダイレクトされる--}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{--foreach 文によるループ--}}
                {{--エラーメッセージがあるなら、それを全て取り出して表示--}}
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form method="POST" action="{{  route('category.store')  }}">
            <div class="form-group">
                <label>カテゴリー名</label>
                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="カテゴリー名を入力して下さい">
            </div>

            <input type="submit" class="btn btn-primary btn-sm" value="送信">

            {{--CSRFトークンが生成される--}}
            {{ csrf_field() }}
        </form>
    </div>
</div>





@endsection