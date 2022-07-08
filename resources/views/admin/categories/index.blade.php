@extends('layouts.dashboard')

@section('content')
    <h2>Categories List</h2>

    <ul class="p-3">
        @foreach ($categories as $item)
            <li class="my-2">
                <a href="{{ route('admin.categories.show', ['slug' => $item->slug]) }}">
                    {{ $item->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
