@extends('layout.app')
@section('content')


    <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

       <input type="hidden" name="id" value="{{$post->id}}">

        <div class="mb-3">
            @if($post->image)
                <img src="{{asset('storage/' . $post->image)}}" width="100">
            @endif
        </div>

        <div class="mb-3">
            <x-forms.input type='text' name='title' value="{{$post->title}}" lable="Title" />
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
        <div class="mb-3">
            <x-forms.input type='file' name="image" lable="Image" />
        </div>

<div >
    <button type="submit" class="btn btn-primary">Update</button>
</div>
    </form>

@endsection
