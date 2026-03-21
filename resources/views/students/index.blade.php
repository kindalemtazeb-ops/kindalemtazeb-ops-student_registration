<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT LISTS</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 20px; background-color: #f4f7f6; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 1100px; margin: auto; }
        h2 { color: #2c3e50; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #eee; padding: 15px; text-align: left; }
        th { background-color: #34495e; color: white; text-transform: uppercase; font-size: 14px; }
        tr:hover { background-color: #f1f1f1; transition: 0.3s; }

        .success { background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; border: 1px solid #c3e6cb; margin-bottom: 20px; }

        /* Buttons Style */
        .btn-edit { background-color: #f39c12; color: white; padding: 8px 14px; text-decoration: none; border-radius: 5px; font-size: 13px; }
        .btn-delete { background-color: #e74c3c; color: white; padding: 8px 14px; border: none; border-radius: 5px; cursor: pointer; font-size: 13px; }
        .btn-register { background-color: #2ecc71; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold; }

        .actions-cell { display: flex; gap: 8px; }
        .search-input { padding: 10px; width: 250px; border: 1px solid #ddd; border-radius: 6px; outline: none; }
        .btn-search { padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 6px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2>STUDENT MANAGEMENT SYSTEM</h2>
        </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <form action="{{ route('students.index') }}" method="GET">
            <input type="text" name="search" class="search-input" placeholder="Search by Student ID..." value="{{ request('search') }}">
            <button type="submit" class="btn-search">Search</button>
            @if(request('search'))
                <a href="{{ route('students.index') }}" style="margin-left: 10px; color: #e74c3c; text-decoration: none;">Clear Search</a>
            @endif
        </form>

        <a href="{{ route('students.create') }}" class="btn-register">+ Register New Student</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>National ID</th>
                <th>Email</th>
                <th>Department</th>
                <th>GPA</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td><strong>{{ $student->student_id }}</strong></td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->national_id }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->department }}</td>
                    <td><span style="background: #eee; padding: 3px 8px; border-radius: 4px;">{{ $student->gpa }}</span></td>
                    <td class="actions-cell">
                        <a href="{{ route('students.edit', $student->student_id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('students.destroy', $student->student_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 30px; color: #7f8c8d;">
                        No student records found in the database.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
