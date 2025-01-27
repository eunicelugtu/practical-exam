<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Post</title>
</head>
<body>

    <h3>{{$post->user->name}}</h3>
    <h4>"{{$post->title}}"</h4>
    <p>{{$post->body}}</p>
    <br>
    <p><i>Last Updated:</i> {{ $post->updated_at->diffForHumans() }}</p>

    @if ($post->user_id == Auth::id())
    <form action="{{route('editPost', ['id' => $post->id])}}" method="GET">
        <button type="submit">Edit</button>
    </form>
    <form action="{{route('deletePost', ['id' => $post->id])}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
    @endif
    <form action="{{route('showTimeline')}}" method="GET">
        <button type="submit">Back</button>
    </form>
    
</body>
</html>