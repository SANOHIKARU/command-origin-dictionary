@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -Edit Category-')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>Category登録・編集

      {{-- 削除ボタン --}}
      <form action="{{ route('category.delete') }}" method="POST" style="display: inline">
        <input type="submit" class="btn btn-danger btn-sm" value="削除"  onClick="delete_alert(event);return false;">
        <input type="hidden" name="category_id" value="{{ $category->category_id }}">
        {{ csrf_field() }}
      </form>

      

    </h2>


    <form method="POST" action="{{  route('category.store')  }}">
      <input type="hidden" name="category_id" value="{{ $category->category_id }}">
      <input type="hidden" name="store_type" value="edit">


      <div class="form-group">
        <label>カテゴリー名</label>
        <input class="form-control" name="name" value="{{ old('name', $category->name) }}" placeholder="カテゴリー名を入力して下さい"  autofocus>
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