@extends('layouts.default')

@section('title', 'Command-Origin-Dictionary - {{ $category->name }} -')

@section('content')


<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>{{ $category_name }}のコマンド一覧</h2>


    <ul>
      <li>
      <a href="{{ route('command.create', ['category_id' => $category->category_id]) }}">[Add Command]</a>
      </li>
      @forelse ($commands as $command)
      <li>
        <a href="{{ route('command.edit', ['id' => $command->id,]) }}">
          {{ $command->name }}
        </a>
        <ul>
        <li>{{ $command->origin }}</li>
        <li>{{ $command->description }}</li>
        </ul>
      </li>

      @empty
      <li>No commands yet</li>
      @endforelse

    </ul>



  </div>
</div>





@endsection