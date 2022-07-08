@extends('layouts.dashboard')

@section('content')
    <h2 class="mb-5">Post list</h2>

    <div class="row row-cols-2">
        @foreach ($posts as $item)
            {{-- Card --}}
            <div class="col mb-3">
                <div class="card">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p>
                            Tags:
                            @forelse ($item->tags as $tag)
                                {{-- Stampiamo una virgola solo se non è l'ultimo elemento nel loop --}}
                                {{ $tag->name }}{{ $loop->last ? '' : ', ' }}
                                {{-- Stampiamo una virgola solo se non è l'ultimo elemento nel loop --}}
                            @empty
                                None
                            @endforelse
                        </p>
                        <a href="{{ route('admin.posts.show', ['post' => $item->id]) }}" class="btn btn-primary">Vai al
                            post
                        </a>
                    </div>
                </div>
            </div>
            {{-- Card --}}
        @endforeach
    </div>
@endsection
