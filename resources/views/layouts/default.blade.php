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

  <script src="./js/jquery.js"></script>
  <script src="./js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/824b56a7d3.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('category.index') }}">Command-Origin-Dictionary -コマンド語源辞典- </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{ route('category.index') }}">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="{{ route('category.create') }}">CategoryCreate</a>
        {{-- <a class="nav-item nav-link active" href="{{ route('category.index') }}">Pricing</a> --}}
        {{-- <a class="nav-item nav-link active" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>

  <div class="container">
    {{--if 文による条件分岐--}}
    @if (session('message'))
    <div class="alert alert-success">
      {{--セッションヘルパーを使ってキーを指定して、セッションに保存されたデータを取り出す--}}
      {{ session('message') }}
    </div>
    <br>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
      {{--セッションヘルパーを使ってキーを指定して、セッションに保存されたデータを取り出す--}}
      {{ session('error') }}
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

    @yield('content')
  </div>
  @yield('script')
</body>
</html>