<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
</head>

    <h3>Hello, {{Auth::user()->name}}!</h3>

    <form action="{{route('createPost')}}" method="GET">
        <button type="submit">Add a Post</button>
    </form>
    <form action="{{route('logout')}}" method="POST" onsubmit="return confirm('Are you sure you want to log out?')">
        @method('POST')
        @csrf
        <button type="submit">Log Out</button>
    </form>
    <br>

    @foreach ($posts as $post)
        <b>{{ $post->user->name }}</b> • {{ $post->updated_at->diffForHumans() }}<br>
        <br>
        <b><i>"{{ $post->title }}"</i></b>
        <p>{{ $post->body }}</p>

        <form action="{{route('showPost', ['id' => $post->id])}}" method="GET">
            <button type="submit">View</button>
        </form>
        <hr>
    @endforeach
    
</body>
</html>