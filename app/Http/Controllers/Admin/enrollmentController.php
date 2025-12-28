<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;

class enrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['professor','course','student'])->get();
        return view('Admin.Enrollment.index', compact('enrollments'));
    }

    public function create()
    {
        $students=Student::all();
        $courses=Course::all();
        $professors=Professor::all();
        return view('Admin.Enrollment.create',compact(['courses','professors','students']));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'studentId'   => ['required', 'exists:students,id'],
            'courseId'    => ['required', 'exists:courses,id'],
            'professorId' => ['required', 'exists:professors,id'],
            'mark'        => ['nullable', 'numeric', 'between:0,100'],
        ]);

        Enrollment::create($input);

        return redirect()->route('enrollment.index')
                         ->with('success', 'Enrollment added successfully');
    }

    public function show(Enrollment $enrollment)
    {
       return view('Admin.Enrollment.details',compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        $students=Student::all();
        $courses=Course::all();
        $professors=Professor::all();
        return view('Admin.Enrollment.edit',compact(['enrollment','courses','professors','students']));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
          $input = $request->validate([
            'studentId'   => ['required', 'exists:students,id'],
            'courseId'    => ['required', 'exists:courses,id'],
            'professorId' => ['required', 'exists:professors,id'],
            'mark'        => ['nullable', 'numeric', 'between:0,100'],
        ]);

        $enrollment->update($input);

        return redirect()->route('enrollment.index')
                         ->with('success', 'Enrollment updated successfully');
    }

    public function destroy(string $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();
        return redirect()->route('enrollment.index')->with('success', 'Enrollment deleted successfully');
    }
}