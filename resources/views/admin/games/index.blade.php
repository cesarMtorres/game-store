@extends('components.layout')

@section('content')

<div class="row">

    <div class="col-sm-12">
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('games.create') }}"> New Game</a>
        </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
  </div>
  <div class="row">
<div class="col-sm-12">
    <h1 class="display-3">games</h1>
  <table class="table table-striped">
    <thead>
        <tr>
            <td></td>
          <td>ID</td>
          <td>Name</td>
          <td>Descriptio</td>
          <td>Url</td>
          <td>Status</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td><img src="storage/{{$game->thumbnail}}" alt="" width="120" height="90"></td>
            <td>{{$game->id}}</td>
            <td>{{$game->name}}
            <td>{{$game->description}}</td>
            <td>{{$game->url}}</td>
            <td>{{$game->status}}</td>
            <td>
                <a href="{{ route('games.edit',$game->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('games.destroy', $game->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
@endsection
