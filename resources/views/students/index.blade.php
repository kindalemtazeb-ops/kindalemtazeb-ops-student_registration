<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT LISTS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-6 font-sans antialiased text-gray-900">

<div class="max-w-5xl mx-auto bg-white p-5 rounded-2xl shadow-lg border border-gray-200">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight uppercase">Student System</h2>
            <p class="text-gray-500 text-xs">Manage your student records efficiently</p>
        </div>
        <a href="{{ route('students.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-bold transition-all transform hover:scale-105 shadow-md flex items-center gap-2 text-xs">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Register New
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-center justify-between shadow-sm">
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800">&times;</button>
        </div>
    @endif

    <div class="mb-6 p-4 bg-slate-50 rounded-xl border border-slate-200 flex flex-wrap items-center gap-3">
        <form action="{{ route('students.index') }}" method="GET" class="flex flex-1 items-center gap-2">
            <div class="relative flex-1 max-w-xs">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" name="search"
                       class="border border-gray-300 pl-9 pr-4 py-2 w-full rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none shadow-sm"
                       placeholder="Search ID or Name..." value="{{ request('search') }}">
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-bold text-sm shadow-sm transition-all active:scale-95">
                Search
            </button>
        </form>

        @if(request('search'))
            <a href="{{ route('students.index') }}" class="text-red-500 hover:text-red-700 font-bold text-xs flex items-center gap-1 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                Clear
            </a>
        @endif
    </div>

    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
        <table class="w-full text-left border-collapse table-auto">
            <thead class="bg-slate-800 text-white text-[11px] uppercase tracking-wider">
                <tr>
                    <th class="p-3 border-b border-slate-700">ID</th>
                    <th class="p-3 border-b border-slate-700">Full Name</th>
                    <th class="p-3 border-b border-slate-700">Email Address</th>
                    <th class="p-3 border-b border-slate-700 text-center">GPA</th>
                    <th class="p-3 border-b border-slate-700 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($students as $student)
                <tr class="hover:bg-slate-50 transition duration-150">
                    <td class="p-3 font-bold text-blue-600 text-sm">#{{ $student->student_id }}</td>
                    <td class="p-3">
                        <div class="font-bold text-gray-800 text-sm">{{ $student->full_name }}</div>
                    </td>
                    <td class="p-3 text-gray-500 text-xs truncate max-w-[180px]">{{ $student->email }}</td>
                    <td class="p-3 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black tracking-wide shadow-sm {{ $student->gpa >= 3.0 ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-amber-100 text-amber-700 border border-amber-200' }}">
                            {{ number_format($student->gpa, 2) }}
                        </span>
                    </td>
                    <td class="p-3">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('students.edit', $student->student_id) }}"
                               class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-[11px] font-bold transition-all flex items-center gap-1 border border-blue-100">
                               <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                               Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->student_id) }}" method="POST"
                                  onsubmit="return confirm('እርግጠኛ ነህ? ይህ መረጃ ዳግም አይመለስም!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-[11px] font-bold transition-all flex items-center gap-1 border border-red-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-16 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-lg font-medium">No records found.</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-sm">
        {{ $students->links() }}
    </div>
</div>

</body>
</html>
