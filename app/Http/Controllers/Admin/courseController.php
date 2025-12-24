<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\DTOs\CourseDTO;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    // Connects the Service to the Controller
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    // 1. Show all courses
    public function index()
    {
        $courses = $this->courseService->getAll();
        return view('Admin.Course.index', compact('courses'));
    }

    // 2. Show the "Create" form
    public function create()
    {
        return view('Admin.Course.create');
    }

    // 3. Save a new course
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'course_code' => 'required|string|max:20',
        ]);

        $dto = CourseDTO::fromRequest($request);
        $this->courseService->store($dto);

        return redirect()->route('course.index')->with('success', 'Course created!');
    }

    // 4. Show details of one course
    public function show($id)
    {
        $course = $this->courseService->find($id);
        return view('Admin.Course.show', compact('course'));
    }

    // 5. Show the "Edit" form
    public function edit($id)
    {
        $course = $this->courseService->find($id);
        return view('Admin.Course.edit', compact('course'));
    }

    // 6. Update the course data
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'course_code' => 'required|string|max:20',
        ]);

        $dto = CourseDTO::fromRequest($request, $id);
        $this->courseService->update($dto);

        return redirect()->route('course.index')->with('success', 'Course updated!');
    }

    // 7. Delete a course
    public function destroy($id)
    {
        $this->courseService->delete($id);
        return redirect()->route('course.index')->with('success', 'Course deleted!');
    }
}