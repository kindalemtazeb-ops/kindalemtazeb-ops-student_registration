<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans min-h-screen flex flex-col items-center py-12 px-4">

    <header class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-slate-800 tracking-tight mb-2">
            Student Records Portal
        </h1>
        <p class="text-slate-500">Search by Student ID & Manage Records</p>
    </header>

    @if(session('success'))
        <div class="w-full max-w-4xl mb-4 bg-green-100 border border-green-300 text-green-800 px-5 py-3 rounded-xl text-sm font-medium shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full max-w-4xl mb-4 flex justify-end">
        <a href="{{ route('students.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition shadow-md flex items-center gap-2 no-underline">
            <span>+</span> <span>Register New Student</span>
        </a>
    </div>

    <div class="w-full max-w-4xl mb-4 flex gap-2">
        <form action="{{ route('students.index') }}" method="GET" class="flex flex-1 gap-2">
            <div class="relative flex-1">
                <input type="text" name="search" class="w-full pl-4 pr-4 py-3 border border-indigo-200 rounded-xl bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm placeholder-slate-400 transition" placeholder="Enter Student ID to search..." value="{{ request('search') }}">
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl text-sm font-medium transition shadow-md">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('students.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-3 rounded-xl text-sm font-medium transition border border-slate-300 no-underline flex items-center">
                    Show All
                </a>
            @endif
        </form>
    </div>

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="bg-indigo-600 text-white text-sm uppercase font-semibold tracking-wider">
                        <th class="py-4 px-6">Student ID</th>
                        <th class="py-4 px-6">Full Name</th>
                        <th class="py-4 px-6">National ID</th>
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Department</th>
                        <th class="py-4 px-6 text-center">GPA</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 divide-y divide-slate-100">
                    @forelse($students as $student)
                        <tr class="hover:bg-indigo-50/50 transition-colors">
                            <td class="py-4 px-6 font-mono text-sm text-slate-400">#{{ $student->student_id }}</td>
                            <td class="py-4 px-6 font-medium text-slate-900">{{ $student->full_name }}</td>
                            <td class="py-4 px-6">{{ $student->national_id }}</td>
                            <td class="py-4 px-6">{{ $student->email }}</td>
                            <td class="py-4 px-6">{{ $student->department }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="{{ $student->gpa >= 3.5 ? 'bg-indigo-100 text-indigo-700' : 'bg-green-100 text-green-700' }} py-1 px-3 rounded-full text-xs font-bold">
                                    {{ $student->gpa }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right flex justify-end gap-3">
                                <a href="{{ route('students.edit', $student->student_id) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold transition no-underline">
                                    Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->student_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold transition bg-transparent border-none cursor-pointer">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 italic bg-slate-50/50">
                                No student records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-slate-50 p-4 border-t border-slate-100 flex justify-between items-center">
            <span class="text-sm text-slate-500">Showing {{ $students->count() }} student(s)</span>
        </div>
    </div>

</body>
</html>
