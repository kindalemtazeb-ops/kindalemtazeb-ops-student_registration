<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>STUDENT REGISTRATION</title>
    <style>
        body { font-family: sans-serif; padding: 30px; background: #f4f4f4; }
        .box { background: white; padding: 20px; max-width: 450px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .error { color: red; font-size: 13px; margin-bottom: 10px; display: block; }
        input { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .show-pw { margin: 10px 0; font-size: 14px; }
    </style>
</head>
<body>

<div class="box">
    <h2>STUDENT REGISTRATION</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label>Student ID:</label>
        <input type="text" name="student_id" value="{{ old('student_id') }}">
        @error('student_id') <span class="error">{{ $message }}</span> @enderror

        <label>Full Name:</label>
        <input type="text" name="full_name" value="{{ old('full_name') }}">
        @error('full_name') <span class="error">{{ $message }}</span> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <label>Password:</label>
        <input type="password" name="password" id="pw">
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" id="cpw">

        <div class="show-pw">
            <input type="checkbox" style="width: auto;" onclick="myFunction()"> Show Password
        </div>

        <label>National ID:</label>
        <input type="text" name="national_id" value="{{ old('national_id') }}">
        @error('national_id') <span class="error">{{ $message }}</span> @enderror

        <label>Department:</label>
        <input type="text" name="department" value="{{ old('department') }}">

        <label>GPA (1.0 - 4.0):</label>
        <input type="number" step="0.01" name="gpa" value="{{ old('gpa') }}">
        @error('gpa') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">REGISTER</button>
    </form>
</div>

<script>
function myFunction() {
    var x = document.getElementById("pw");
    var y = document.getElementById("cpw");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
</script>

</body>
</html>
