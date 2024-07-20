@extends('layout.app')

@section('title')
    Posts
@endsection

@section('content')
    <table class="mx-auto table">
        <thead>
        <tr>
            <th scope="col">Id</th>
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

    {{$posts->links()}}

{{--    <nav aria-label="Page navigation example">--}}
{{--        <ul class="pagination">--}}
{{--            <li class="page-item"><a class="page-link" href="{{$posts->links()}}">Previous</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="{{$posts->links()}}">1</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--        </ul>--}}
{{--    </nav>--}}

@endsection
