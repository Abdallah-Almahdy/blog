@extends('layout.app')
@section('title')
    index
@endsection
@section('content')
    <div class="container mt-4">
        <div class="text-center">
            <a href="{{ route('Posts.create') }}"> <button type="button" class="btn btn-success mb-5 ">Create
                    Posts</button></a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{$post->user?$post->user->name:'not found'}}</td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td>

                            <a href="{{ route('Posts.show', $post['id']) }}"> <button type="button"
                                    class="btn btn-info">View</button></a>
                            <a href="{{ route('Posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
                            <form style="display: inline" method="POST" action="{{ route('Posts.delete', $post['id']) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" id='btnDelete'class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
