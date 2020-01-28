@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -Create Command-')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>
      <a href="{{ route('category.show', ['category_id' => $category->category_id])  }}">{{ $category->name }}</a>      
      's Command登録・編集    
    </h2>

    <form method="POST" action="{{  route('command.store')  }}">

      <input type="hidden" name="category_id" value="{{ $category->category_id }}">
      <input type="hidden" name="store_type" value="create">

      <div class="form-group">
        <label>カテゴリー名</label>
        <input class="form-control" name="name" value="{{ $category->name }}" placeholder="" disabled>
      </div>

      <div class="form-group">
        <label>コマンド名</label>
        <input class="form-control" name="name" value="{{ old('name') }}" placeholder="コマンド名を入力して下さい"  autofocus>
      </div>

      <div class="form-group">
        <label>語源説明</label>
        <input class="form-control" name="origin" value="{{ old('origin') }}" placeholder="語源説明を入力して下さい">
      </div>

      <div class="form-group">
        <label>コマンド説明</label>
        <input class="form-control" name="description" value="{{ old('description') }}" placeholder="コマンド説明を入力して下さい">
      </div>
      <input type="submit" class="btn btn-primary btn-sm" value="送信">

      {{--CSRFトークンが生成される--}}
      {{ csrf_field() }}
    </form>
  </div>
</div>





@endsection