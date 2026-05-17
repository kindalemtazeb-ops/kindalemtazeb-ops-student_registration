<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans min-h-screen flex flex-col items-center py-12 px-4">

    <header class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-slate-800 tracking-tight mb-2">
            Register New Student
        </h1>
        <p class="text-slate-500">Fill in the details below to add a new student record</p>
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

        <form action="{{ route('students.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Student ID</label>
                <input type="text" name="student_id" value="{{ old('student_id') }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="e.g. 1212">
                @error('student_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="e.g. Abebe Alemu">
                @error('full_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="e.g. abebe@example.com">
                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Password</label>
                <input type="password" name="password" id="pw" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="Min 8 chars, mixed case, numbers & symbols">
                @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="cpw" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="Re-enter password">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" id="showPw" onclick="togglePassword()" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                <label for="showPw" class="text-sm text-slate-500 cursor-pointer">Show Password</label>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">National ID</label>
                <input type="text" name="national_id" value="{{ old('national_id') }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="e.g. 123456789">
                @error('national_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Department</label>
                <input type="text" name="department" value="{{ old('department') }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="e.g. Computer Science">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">GPA (1.0 - 4.0)</label>
                <input type="number" step="0.01" min="1" max="4" name="gpa" value="{{ old('gpa') }}" required
                    class="w-full p-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    placeholder="e.g. 3.5">
                @error('gpa') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <a href="{{ route('students.index') }}" class="flex-1 text-center bg-slate-200 hover:bg-slate-300 text-slate-700 py-3 rounded-xl text-sm font-medium transition no-underline">
                    Cancel
                </a>
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl text-sm font-medium transition shadow-md">
                    Register Student
                </button>
            </div>
        </form>
    </div>

<script>
function togglePassword() {
    var pw = document.getElementById("pw");
    var cpw = document.getElementById("cpw");
    if (pw.type === "password") {
        pw.type = "text";
        cpw.type = "text";
    } else {
        pw.type = "password";
        cpw.type = "password";
    }
}
</script>

</body>
</html>
