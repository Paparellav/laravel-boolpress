<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center">
        E' stato creato un nuovo post.
    </h2>
    <h2> {{ $post->title }} </h2>
    <p class="my-5" style="width: 50%">{{ $post->content }}</p>
    <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Read post</a>
</body>

</html>
