<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Debark University</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; line-height: 1.6; background-color: #f9f9f9; }
        .container { max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin: auto; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, select { padding: 10px; margin: 5px 0 15px 0; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #2c3e50; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        button:hover { background: #34495e; }
        .back-link { display: block; margin-top: 15px; text-align: center; color: #3498db; text-decoration: none; }
        .error-box { color: white; background: #e74c3c; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Student Information</h2>
    <p>Student ID: <strong>{{ $student->student_id }}</strong></p>

    {{-- የኤረር መልዕክቶች ካሉ እዚህ ጋር ይታያሉ --}}
    @if ($errors->any())
        <div class="error-box">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- እዚህ ጋር route ላይ $student->student_id መጠቀማችንን እርግጠኛ ሁን --}}
    <form action="{{ route('students.update', $student->student_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Full Name</label>
        <input type="text" name="full_name" value="{{ old('full_name', $student->full_name) }}" required>

        <label>Email Address</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}" required>

        <label>National ID</label>
        <input type="text" name="national_id" value="{{ old('national_id', $student->national_id) }}" required>
        <label>Student ID</label>
        <input type="text" name="student_id" value="{{old('student_id', $student->student_id) }}" required>
        <!--<label>password</label>
        <input type="password" name="password" value="{{ old('password', $student->password) }}" required>-->

        <label>Department</label>
        <input type="text" name="department" value="{{ old('department', $student->department) }}" required>

        <label>GPA</label>
        <input type="number" name="gpa" step="0.01" min="0" max="4.00" value="{{ old('gpa', $student->gpa) }}" required>

        <button type="submit">Update Information</button>
    </form>

    <a href="{{ route('students.index') }}" class="back-link">← Cancel and Go Back</a>
</div>

</body>
</html>
