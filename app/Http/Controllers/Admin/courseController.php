<?php

namespace App\Http\Controllers\Admin;

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
        return view('Admin.Course.index', compact('courses'));
    }

    public function create()
    {
        return view('Admin.Course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'symbol' => 'required|string|max:20',
            'unit'   => 'required|integer',
        ]);

        $dto = CourseDTO::fromRequest($request);
        $this->courseService->store($dto);

        return redirect()->route('course.index')->with('success', 'Course created!');
    }

    public function show($id)
    {
        $course = $this->courseService->find($id);
        return view('Admin.Course.details', compact('course'));
    }

    public function edit($id)
    {
        $course = $this->courseService->find($id);
        return view('Admin.Course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
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