@extends('layouts.dashboard')

@section('content')
    <h1>Create a new post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post">
        @method('post')
        @csrf

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    {{-- Se quanto inserito precedentemente dall'utente è uguale all'id del db inseriamo selected --}}
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" class="form-control" name="content" id="content"> {{ old('content') }} </textarea>
        </div>
        <div class="form-group">
            <h5 class="my-4">Select tags for your post (1 or many)</h5>
            @foreach ($tags as $tag)
                <div class="form-check">
                    {{-- Ricordiamoci che tags è una collection per questo nel name inseriamo tags[] --}}
                    {{-- Ricordiamoci altresì che "for" Label e "id" Input devono essere uguali --}}
                    {{-- Ricordiamoci di inserire nella value sempre l'id --}}
                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                        id="tag-{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
