@extends('layout.app')

@section('content')

    <div class="card">
        <div class="card-header">
           Post Details
        </div>
        <div class="card-body">
            <h3 class="card-title">Title:-</h3>
            <p class="card-text"> {{$post->title}} </p>
            <h3 class="card-title">Description:-</h3>
            <p class="card-text">{{$post->description}}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name:-</h5>
            <p class="card-text"> {{$post->user->name}} </p>
            <h3 class="card-title">Email:-</h3>
            <p class="card-text">{{$post->user->email}}</p>
            <h3 class="card-title">Created At:-</h3>
            <h5 class="card-text"> {{$post->created_at->format('l jS \of F Y h:i:s A')}} </h5>
        </div>
    </div>




@endsection
