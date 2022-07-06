@extends('layouts.dashboard')

@section('content')
    <h2> {{ $current_post->title }} </h2>
    <small class="mt-5 mb-5 d-block">Slug: {{ $current_post->slug }}</small>
    <p style="width: 50%">{{ $current_post->content }}</p>

    {{-- <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a> --}}
@endsection