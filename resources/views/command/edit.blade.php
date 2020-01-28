@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -Edit Command-')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>
      <a href="{{ route('category.show', ['category_id' => $category->category_id])  }}">{{ $category->name }}</a>
      's Commandの登録・編集

      {{-- 削除ボタン --}}
      <form action="{{ route('command.delete') }}" method="POST" style="display: inline">
        <input type="submit" class="btn btn-danger btn-sm" value="削除" onClick="delete_alert(event);return false;">
        <input type="hidden" name="id" value="{{ $command->id }}">
        {{ csrf_field() }}
      </form>

    </h2>





    <form method="POST" action="{{  route('command.store')  }}">

      <input type="hidden" name="category_id" value="{{ $category->category_id }}">
      <input type="hidden" name="id" value="{{ $command->id }}">

      <div class="form-group">
        <label>カテゴリー名</label>
        <input class="form-control" name="name" value="{{ $category->name }}" placeholder="" disabled>
      </div>

      <div class="form-group">
        <label>コマンド名</label>
        <input class="form-control" name="name" value="{{ old('name',$command->name) }}" placeholder="コマンド名を入力して下さい"  autofocus>
      </div>

      <div class="form-group">
        <label>語源説明</label>
        <input class="form-control" name="origin" value="{{ old('origin', $command->origin) }}"
          placeholder="語源説明を入力して下さい">
      </div>

      <div class="form-group">
        <label>コマンド説明</label>
        <input class="form-control" name="description" value="{{ old('description', $command->description) }}"
          placeholder="コマンド説明を入力して下さい">
      </div>
      <input type="submit" class="btn btn-primary btn-sm" value="送信">

      {{--CSRFトークンが生成される--}}
      {{ csrf_field() }}
    </form>
  </div>
</div>





@endsection
@section('script')
<script>
function delete_alert(e){
   if(!window.confirm('本当に削除しますか？')){
      return false;
   }
   document.deleteform.submit();
};
</script>
@endsection