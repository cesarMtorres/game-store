@extends('app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3"></h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
</div>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
      <form method="post" enctype="multipart/form-data" action="{{ route('games.store') }}">
          @csrf
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <textarea type="text" class="form-control" id="description" name="description"/> </textarea>
          </div>

          <div class="form-group">
              <label for="url">Url:</label>
              <input type="text" id="url" class="form-control" name="url"/>
          </div>
          <div class="form-group">
              <label for="thumbnail">thumbnail:</label>
                <div class="form-group">
                    <input type="file" name="thumbnail" placeholder="Choose image" id="thumbnail">
                    @error('thumbnail')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
          </div>
              <div class="form-group">
                  <label for="status">Status:</label>
                       <select name="status" id="status">
                        <option>--</option>
                     <option value="ONLINE">ONLINE</option>
                     <option value="OFFLINE">OFFLINE</option>
                </select>
               </div>
          <button type="submit" class="btn btn-primary">Add contact</button>
      </form>
  </div>
</div>
@endsection
