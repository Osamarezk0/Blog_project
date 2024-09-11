@extends('layout.app')

@section('title')
    Posts
@endsection

@section('content')
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        <x-forms.input :value="request('title')" name="title" type="text" class="mx-2"/>
        <button class="btn btn-dark mx-2">Filter</button>
    </form>
    <table class="mx-auto table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>
                        @if($post->image)
                        <img src="{{asset('storage/' . $post->image)}}" width="100">
                        @endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->format("Y-m-d")}}</td>

                    <td>
                        <a class="btn btn-info" href="{{route('posts.show',$post->id)}}">View</a>
                        <a class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">Edit</a>
                        <form method="post" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

    {{$posts->withQueryString()->links()}}


@endsection
