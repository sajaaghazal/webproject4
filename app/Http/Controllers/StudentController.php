<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\StudentService;
use App\DTOs\StudentDTO;
use Illuminate\Http\Request;

class studentController extends Controller
{
    protected $studentService;

    // Injecting the Service for Encapsulation (W11)
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        // Get all students using the Service [cite: 89]
        $students = $this->studentService->getAllStudents();
        return view('Admin.Student.index', compact('students'));
    }

    public function show(Student $student)
    {
        return view('Admin.Student.show', compact('student'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'stNo'     => ['required', 'unique:students,stNo'],
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:students,email', 'regex:/^[A-Za-z0-9._%+-]+@limu\.edu\.ly$/'],
            'password' => ['required'],
            'avg'      => ['nullable', 'numeric'],
            'status'   => ['required', 'in:active,notActive,dismissed'],
        ]);

        // Transfer data using the DTO [cite: 91]
        $dto = StudentDTO::fromRequest($validated);
        $this->studentService->createStudent($dto);

        return redirect()->route('student.index')->with('success', 'Student added!');
    }
}