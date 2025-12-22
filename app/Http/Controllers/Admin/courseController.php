<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('Admin.Course.index', compact('courses'));
    }

    public function create()
    {
        return view('Admin.Course.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name'   => ['required', 'unique:courses,name'],
            'symbol' => ['required', 'unique:courses,symbol'],
            'unit'   => ['required'], // required now
        ]);

        Course::create($input);

        return redirect()->route('course.index')
                         ->with('success', 'Course added successfully!');
    }

    public function show(Course $course)
    {
        return view('Admin.Course.details', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('Admin.Course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $input = $request->validate([
            'name'   => ['required', "unique:courses,name,{$course->id}"],
            'symbol' => ['required', "unique:courses,symbol,{$course->id}"],
            'unit'   => ['required'], // required here too
        ]);

        $course->update($input);

        return redirect()->route('course.index')
                         ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')
                         ->with('success', 'Course deleted successfully!');
    }
}
