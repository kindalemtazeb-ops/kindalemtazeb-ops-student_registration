<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 350px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>STUDENT LOGIN</h2>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <label>Email Address</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label>Password</label>
        <input type="password" name="password" required>

        @if($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <button type="submit">LOGIN</button>
    </form>
    <p style="font-size: 13px; margin-top: 15px;">Don't have an account? <a href="{{ route('students.create') }}">Register here</a></p>
</div>

</body>
</html>
