@extends('layouts.dashboard')

@section('content')
    <h2> {{ $current_post->title }} </h2>
    <small class="mt-5 mb-5 d-block">Slug: {{ $current_post->slug }}</small>
    <p style="width: 50%">{{ $current_post->content }}</p>

    <div class="d-flex justify-content-between" style="max-width: 150px; min-width: 120px">
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $current_post->id]) }}">Update
        </a>
        <form action="{{ route('admin.posts.destroy', ['post' => $current_post->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
