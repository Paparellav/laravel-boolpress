@extends('layouts.dashboard')

@section('content')
    <h1>Modify selected post</h1>

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

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}" {{ $current_post->category && old('category_id', $current_post->category->id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title"
                value="{{ old('title') ? old('title') : $current_post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" class="form-control" name="content" id="content"> {{ old('content') ? old('content') : $current_post->content }} </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
