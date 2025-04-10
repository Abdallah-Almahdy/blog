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
    <form method="post" action="{{ route('Posts.store') }}">
        @csrf
        <div class="container mt-5">
            <div class="mb-3">
                <label for="FormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="FormControlInput1" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="discription">{{old('discription')}}</textarea>

            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="creator">
                    <option selected>Open this select menu</option>

                    @foreach ($users as $user)
                        {
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        }
                    @endforeach


                </select>
            </div>
            <button class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection
