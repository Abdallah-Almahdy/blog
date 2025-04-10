@extends('layout.app')
@section('title')
    show product
@endsection
@section('content')


    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form method="POST" action="{{route('Posts.update',$post->id)}}">
       @csrf
       @method('PUT')
        <div class="container mt-5">
            <div class="mb-3">
                <label for="FormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{$post->title}}" name="title" id="FormControlInput1">
            </div>
            <div class="mb-3">
                <label  for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control"  id="exampleFormControlTextarea1" rows="3" name="description">{{$post->description}}</textarea>

            </div>
            <div class="mb-3">
                <select  required class="form-select" aria-label="Default select example" name="creator">
                    <option selected>Open this select menu</option>
                    @foreach($users as $user){
                        <option @if($user->id == $post->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                    }
                   @endforeach
                </select>
            </div>
            <button class="btn btn-success">Updata</button>
        </div>
    </form>
@endsection
