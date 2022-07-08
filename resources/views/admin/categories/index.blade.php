@extends('layouts.dashboard')

@section('content')
    <h2>Categories List</h2>

    @foreach ($categories as $item)
        <li>
            <a href="{{ route('admin.categories.show', ['slug' => $item->slug]) }}">
                {{ $item->name }}
            </a>
        </li>
    @endforeach
@endsection