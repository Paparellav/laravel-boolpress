@extends('layouts.dashboard')

@section('content')
    <h1>Modify selected post</h1>

    {{-- Schermata che visualizza gli errori (se dovessero essercene) --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $current_post->id]) }}" method="post">
        @method('put')
        @csrf

        {{-- Input categorie --}}
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $current_post->category && old('category_id', $current_post->category->id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Input Titolo --}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title"
                value="{{ old('title') ? old('title') : $current_post->title }}">
        </div>

        {{-- Input descrizione --}}
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" class="form-control" name="content" id="content"> {{ old('content') ? old('content') : $current_post->content }} </textarea>
        </div>

        {{-- Input Tag --}}
        <div class="form-group">
            <h5 class="my-4">Modify tags for your post (1 or many)</h5>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                        id="tag-{{ $tag->id }}" {{-- Per ogni tag controlliamo che questo sia incluso nei tag collegati al post.
                        Se sì si spunta il checked, altrimenti non si fa nulla. --}}
                        {{ $current_post->tags->contains($tag) || in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>

        {{-- Input immagine --}}
        <div class="mb-3">
            <label for="image">Modify current image</label>
            <input type="file" id="image" name="image">

            @if ($current_post->image)
                <h5>Current image</h5>
                <img src="{{ asset('storage/' . $current_post->image) }}" alt="{{ $current_post->title }}">
            @endif
        </div>

        {{-- Submit button --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
