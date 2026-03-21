<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    /**
     * ሁሉንም ተማሪዎች ማሳያ (Search ጨምሮ)
     */
    public function index(Request $request)
    {
        $query = Student::query();
        if ($request->filled('search')) {
            $query->where('student_id', 'like', '%' . $request->search . '%');
        }
        $students = $query->get();
        return view('students.index', compact('students'));
    }

    /**
     * አዲስ መመዝገቢያ ፎርም
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * አዲስ ተማሪ ዳታቤዝ ውስጥ ለመመዝገብ
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|numeric|unique:students,student_id',
            'national_id' => 'required|numeric|unique:students,national_id',
            'full_name'   => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email'       => 'required|email|unique:students,email',
            'department'  => 'required',
            'gpa'         => 'required|numeric|between:1.0,4.0',
            'password'    => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            ],
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
            'full_name.regex'    => 'The full name field must contain only letters.',
            'gpa.between'        => 'The GPA must be between 1.0 and 4.0.',
            'student_id.numeric' => 'The student ID must be a number.',
            'national_id.numeric'=> 'The national ID must be a number.',
        ]);

        Student::create([
            'student_id'  => $request->student_id,
            'full_name'   => $request->full_name,
            'email'       => $request->email,
            'national_id' => $request->national_id,
            'department'  => $request->department,
            'gpa'         => $request->gpa,
            'password'    => Hash::make($request->password),
        ]);

        return redirect()->route('students.index')->with('success', 'Student registered successfully!');
    }

    /**
     * የማስተካከያ (Edit) ገጽ ማሳያ
     */
    public function edit($student_id)
    {
        // ተማሪውን በ ID ፈልጎ ማግኘት
        $student = Student::where('student_id', $student_id)->firstOrFail();
        return view('students.edit', compact('student'));
    }

    /**
     * የተስተካከለውን ዳታ ማደሻ (Update)
     */
    public function update(Request $request, $student_id)
    {
        $student = Student::where('student_id', $student_id)->firstOrFail();

        $request->validate([
            'full_name'   => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email'       => 'required|email|unique:students,email,' . $student->student_id . ',student_id',
            'national_id' => 'required|numeric|unique:students,national_id,' . $student->student_id . ',student_id',
            'department'  => 'required',
            'gpa'         => 'required|numeric|between:1.0,4.0',
        ]);

        $student->update([
            'full_name'   => $request->full_name,
            'email'       => $request->email,
            'national_id' => $request->national_id,
            'department'  => $request->department,
            'gpa'         => $request->gpa,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * ተማሪን ከሲስተም ለመሰረዝ (Delete)
     */
    public function destroy($student_id)
    {
        $student = Student::where('student_id', $student_id)->firstOrFail();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
