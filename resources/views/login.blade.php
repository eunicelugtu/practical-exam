<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h2>Welcome!</h2>
    
    <form action="{{route('login')}}" method="POST">
        @method('POST')
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" min="8" required>
        <br>
        <br>
        <button type="submit">Log In</button>
    </form>

    <form action="{{route('home')}}" method="GET">
        <button type="submit">Back</button>
    </form>

    <br>
    
    No account yet? <a href="{{route('register')}}">Register here</a>
    
</body>
</html>