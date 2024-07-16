@extends('layout.app')
@section('content')


    <form method="post" action="{{route('posts.store')}}">
  @csrf
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="title">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
    <label for="user_id" class="form-label">Post Creator</label>
    <input type="number" class="form-control" name="user_id" id="title" placeholder="post creator">
</div>

<div >
    <button type="submit" class="btn btn-success">Create</button>
</div>
    </form>

@endsection
