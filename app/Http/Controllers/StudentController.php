<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{    public function create()
    {
        return view('students.create');
    }

    // Store the new student in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'studentid'=>'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|string|max:20',
            'grade' => 'required|string|max:10',
        ]);

        Student::create($validatedData);

        return redirect()->route('students.create')->with('success', 'Student added successfully!');
    }

    // ... (keep existing methods)

    // Show the form for searching students
    public function searchForm()
    {
        return view('students.search');
    }

    // Search for a student by ID
    public function search(Request $request)
    {
        $student_id = $request->input('studentid');
        $student = Student::where('studentid', $student_id)->first();

        if ($student) {
            return view('students.find', compact('student'));
        } else {
            return redirect()->back()->with('error', 'Student not found');
        }
    }

    // Show the form for editing a specific student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update the student details in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'studentid' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone_number' => 'required|string|max:20',
            'grade' => 'required|string|max:10',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validatedData);

        return redirect()->route('student.find')->with('success', 'Student updated successfully!');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.find')->with('success', 'Student deleted successfully!');
    }
}