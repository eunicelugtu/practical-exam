<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Welcome!</h2>
    <p>Are you new here?</p>

    <form action="{{route('register')}}" method="POST">
        @method('POST')
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" min="8" required>
        <br>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <br>
        <button type="submit">Register</button>
    </form>

    <br>

    Already have an account? <a href="{{route('login')}}">Log In</a>

</body>
</html>