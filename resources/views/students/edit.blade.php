<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Debark University</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans min-h-screen flex flex-col items-center py-12 px-4">

    <header class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-slate-800 tracking-tight mb-2">
            Edit Student Information
        </h1>
        <p class="text-slate-500">Student ID: <span class="font-mono font-bold text-slate-700">#{{ $student->student_id }}</span></p>
    </header>

    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200">

        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-3 rounded-xl text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->student_id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Student ID</label>
                <input type="text" name="student_id" value="{{ old('student_id', $student->student_id) }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', $student->full_name) }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">National ID</label>
                <input type="text" name="national_id" value="{{ old('national_id', $student->national_id) }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Department</label>
                <input type="text" name="department" value="{{ old('department', $student->department) }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">GPA (1.0 - 4.0)</label>
                <input type="number" name="gpa" step="0.01" min="1" max="4.00" value="{{ old('gpa', $student->gpa) }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div class="flex gap-3 pt-2">
                <a href="{{ route('students.index') }}" class="flex-1 text-center bg-slate-200 hover:bg-slate-300 text-slate-700 py-3 rounded-xl text-sm font-medium transition no-underline">
                    Cancel
                </a>
                <button type="submit" class="flex-1 bg-amber-500 hover:bg-amber-600 text-white py-3 rounded-xl text-sm font-medium transition shadow-md">
                    Update Student
                </button>
            </div>
        </form>
    </div>

</body>
</html>
