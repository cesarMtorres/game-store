
@extends('app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('games.update', $game->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $game->name }} />
            </div>

          <div class="form-group">
              <label for="last_name">Description:</label>
              <textarea type="text" class="form-control" name="description"/> {{$game->description}}</textarea>
          </div>

          <div class="form-group">
              <label for="url">Url:</label>
              <input type="text" class="form-control" name="url" value="{{$game->url}}"/>
          </div>
          <div class="form-group">
              <label for="city">thumbnail:</label>
                <div class="form-group">
             <img src="storage/{{$game->thumbnail}}" alt="" width="120" height="90">
                    @error('thumbnail')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
          </div>
              <div class="form-group">
                  <label for="status">Status:</label>
                       <select name="status" id="status">
                           <option>{{$game->status}}</option>
                     <option value="ONLINE">ONLINE</option>
                     <option value="OFFLINE">OFFLINE</option>
                </select>


            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
