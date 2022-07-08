@extends('layouts.dashboard')

@section('content')
    <h4>
        <strong>Category: </strong>{{ $category->name }}
    </h4>
    <h5 class="my-4">
        <strong>Slug: </strong>{{ $category->slug }}
    </h5>

    <ul class="p-3">
        @forelse ($category->posts as $item)
            <li>
                <a href="{{ route('admin.posts.show', ['post' => $item->id]) }}">
                    {{ $item->title }}
                </a>
            </li>
        @empty
            <li>
                There are no posts in this category
            </li>
        @endforelse
    </ul>
@endsection
