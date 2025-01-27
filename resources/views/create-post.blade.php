<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <h3>Anything to share?</h3>

    <form action="{{route('savePost')}}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $post->title ?? '' }}"><br>
        <label for="body">Body:</label><br>
        <input type="text" id="body" name="body" value="{{ $post->body ?? '' }}"><br>
        <br>
        <button type="submit">Create</button>
    </form>

    <form action="{{route('showTimeline')}}" method="GET">
        <button type="submit">Back to Timeline</button>
    </form>
</body>
</html>