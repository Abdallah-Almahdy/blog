@extends('layout.app')
@section('title') show  product @endsection
@section('content')
    <div class="container">


        <div class="card mb-5 mt-5">
            <h5 class="card-header">Post Info</h5>
            <div class="card-body">
                <h5 class="card-title">Title: {{ $post->user->name}}</h5>
                <p class="card-text">Description: {{ $post->description }}</p>

            </div>
        </div>


        <div class="card">
            <h5 class="card-header">Post Creator info</h5>
            <div class="card-body">
                <h5 class="card-title">Name:{{$post->user->name}}</h5>
                <p class="card-text">Email: {{$post->user->email}}</p>
                <p class="card-text">Created At: {{$post->created_at}}</p>

            </div>
        </div>
    </div>
@endsection
