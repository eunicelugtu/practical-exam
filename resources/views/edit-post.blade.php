<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h3>Edit</h3>

    <form action="{{route('updatePost', ['id' => $post->id])}}" method="POST">
        @method('PUT')
        @csrf
        <label for="title">Title:</label>
        <input value="{{$post->title}}" type="text" id="title" name="title"><br>
        <label for="body">Body:</label>
        <input value="{{$post->body}}" type="text" id="body" name="body" required><br>
        <button type="submit">Update</button>
    </form>

    <form action="{{route('showTimeline')}}" method="GET">
        <button type="submit">Back</button>
    </form>
    
</body>
</html>