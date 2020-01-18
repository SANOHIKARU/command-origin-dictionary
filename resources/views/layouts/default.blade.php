<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href=""> --}}

    {{--asset ヘルパー関数を使うと public/ 配下ファイルへのURLを生成してくれる--}}
    {{--bootstrap.min.css は最初からインストールされている--}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/blog.css') }}">
    
  </head>

  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>