@extends('layout.app')
@section('content')


    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
  @csrf
<div class="mb-3">
    <x-forms.input lable="Title" type="text" name="title"/>
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
    </textarea>
</div>
<div class="mb-3">
    <label for="user_id" class="form-label">Post Creator</label>
    <select class="form-select" aria-label="Default select example" name="user_id">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select></div>

        <div class="mb-3">
           <x-forms.input lable="Image" type="file" name="image" />
        </div>
<div>
    <button type="submit" class="btn btn-success">Create</button>
</div>
    </form>

@endsection
