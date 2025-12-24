<?php

namespace App\Http\Controllers\Admin; // Make sure this namespace is correct for your folder



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\DTOs\CourseDTO;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $courses = $this->courseService->getAll();
        // Make sure this matches your view folder (Admin.Course.index or courses.index)
        return view('Admin.Course.index', compact('courses'));
    }

    public function create()
    {
        return view('Admin.Course.create');
    }

    public function store(Request $request)
    {
        // 1. Validate using the names in your Model
        $request->validate([
            'name'   => 'required|string|max:255',
            'symbol' => 'required|string|max:20',
            'unit'   => 'required|integer',
        ]);

        // 2. Create the DTO
        $dto = CourseDTO::fromRequest($request);

        // 3. Save via Service
        $this->courseService->store($dto);

        // 4. Redirect back to index
        return redirect()->route('course.index')->with('success', 'Course created successfully!');
    }

    public function show($id)
    {
        $course = $this->courseService->find($id);
        return view('Admin.Course.show', compact('course'));
    }

    public function edit($id)
    {
        $course = $this->courseService->find($id);
        return view('Admin.Course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'symbol' => 'required|string|max:20',
            'unit'   => 'required|integer',
        ]);

        $dto = CourseDTO::fromRequest($request, $id);
        $this->courseService->update($dto);

        return redirect()->route('course.index')->with('success', 'Course updated!');
    }

    public function destroy($id)
    {
        $this->courseService->delete($id);
        return redirect()->route('course.index')->with('success', 'Course deleted!');
    }
}