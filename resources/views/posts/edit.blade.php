@extends('layout.app')
@section('content')


    <form method="post" action="{{route('posts.update',$post->id)}}">
        @method('PUT')
        @csrf
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" name="description"
      id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
</div>
<div class="mb-3">
    <label for="user_id" class="form-label">Post Creator</label>
    <select class="form-select" aria-label="Default select example" name="user_id">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
</div>

<div >
    <button type="submit" class="btn btn-primary">Update</button>
</div>
    </form>

@endsection