@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary -TOP-')
    
@section('content')
    <h1>Command-Origin-Dictionary</h1>
    <h3>
      <a href="{{ route('category.create') }}">
        カテゴリー新規作成
      </a>
    </h3>
    <h2>
      <ul>
        @forelse ($categories as $category)
        <li>
          {{-- <a href="{{ action(CommandController@index, $category) }}"> --}}
          {{ $category->name }}
          {{-- </a> --}}
        </li>
            
        @empty
        <li>No categories yet</li>
        @endforelse

      </ul>
      {{-- <script src="/js/main.js"></script> --}}

    </h2>
@endsection