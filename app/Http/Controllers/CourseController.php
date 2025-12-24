<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Temporary storage in session for testing
    private function getCoursesFromSession()
    {
        return session('courses', []);
    }
    
    private function saveCoursesToSession($courses)
    {
        session(['courses' => $courses]);
    }

    /**
     * Display a listing of courses.
     */
    public function index()
    {
        // Get courses from session
        $courses = $this->getCoursesFromSession();
        
        // Convert all arrays to objects for consistent access
        $courses = array_map(function($course) {
            return (object)$course;
        }, $courses);
        
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        // Dummy departments for dropdown
        $departments = [
            (object)['id' => 1, 'name' => 'Computer Science'],
            (object)['id' => 2, 'name' => 'Mathematics'],
            (object)['id' => 3, 'name' => 'English'],
            (object)['id' => 4, 'name' => 'Physics'],
        ];
        
        return view('admin.course.create', compact('departments'));
    }

    /**
     * Store a newly created course.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1|max:6',
            'department_id' => 'nullable|integer'
        ]);
        
        // Get existing courses from session
        $courses = $this->getCoursesFromSession();
        
        // Generate a new ID (find the highest ID and add 1)
        $newId = 1;
        if (!empty($courses)) {
            $ids = array_column($courses, 'id');
            if (!empty($ids)) {
                $newId = max($ids) + 1;
            }
        }
        
        // Create new course as array
        $newCourse = [
            'id' => $newId,
            'code' => $validated['code'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'credits' => (int)$validated['credits'],
            'department_id' => $validated['department_id'] ?? null,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ];
        
        // Add to courses array
        $courses[] = $newCourse;
        
        // Save to session
        $this->saveCoursesToSession($courses);
        
        // Redirect to index page with success message
        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        $courses = $this->getCoursesFromSession();
        
        // Find the course
        $course = null;
        foreach ($courses as $c) {
            if ($c['id'] == $id) {
                $course = (object)$c;
                break;
            }
        }
        
        // If not found, redirect to index
        if (!$course) {
            return redirect()->route('courses.index')
                ->with('error', 'Course not found.');
        }
        
        // Add department name
        if ($course->department_id == 1) {
            $course->department = (object)['name' => 'Computer Science'];
        } elseif ($course->department_id == 2) {
            $course->department = (object)['name' => 'Mathematics'];
        } elseif ($course->department_id == 3) {
            $course->department = (object)['name' => 'English'];
        } else {
            $course->department = (object)['name' => 'Not assigned'];
        }
        
        // Dummy enrollments
        $enrollments = [];
        
        return view('admin.course.show', compact('course', 'enrollments'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit($id)
    {
        $courses = $this->getCoursesFromSession();
        
        // Find the course
        $course = null;
        foreach ($courses as $c) {
            if ($c['id'] == $id) {
                $course = (object)$c;
                break;
            }
        }
        
        // If not found, redirect to index
        if (!$course) {
            return redirect()->route('courses.index')
                ->with('error', 'Course not found.');
        }
        
        // Dummy departments for dropdown
        $departments = [
            (object)['id' => 1, 'name' => 'Computer Science'],
            (object)['id' => 2, 'name' => 'Mathematics'],
            (object)['id' => 3, 'name' => 'English'],
            (object)['id' => 4, 'name' => 'Physics'],
        ];
        
        return view('admin.course.edit', compact('course', 'departments'));
    }

    /**
     * Update the specified course.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1|max:6',
            'department_id' => 'nullable|integer'
        ]);
        
        // Get courses from session
        $courses = $this->getCoursesFromSession();
        
        // Find and update the course
        $found = false;
        foreach ($courses as &$course) {
            if ($course['id'] == $id) {
                $course['code'] = $validated['code'];
                $course['title'] = $validated['title'];
                $course['description'] = $validated['description'] ?? null;
                $course['credits'] = (int)$validated['credits'];
                $course['department_id'] = $validated['department_id'] ?? null;
                $course['updated_at'] = now()->toDateTimeString();
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            return redirect()->route('courses.index')
                ->with('error', 'Course not found.');
        }
        
        // Save updated courses to session
        $this->saveCoursesToSession($courses);
        
        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified course.
     */
    public function destroy($id)
    {
        $courses = $this->getCoursesFromSession();
        
        // Find the course index
        $index = null;
        foreach ($courses as $i => $course) {
            if ($course['id'] == $id) {
                $index = $i;
                break;
            }
        }
        
        if ($index === null) {
            return redirect()->route('courses.index')
                ->with('error', 'Course not found.');
        }
        
        // Remove the course
        array_splice($courses, $index, 1);
        
        // Save updated courses to session
        $this->saveCoursesToSession($courses);
        
        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}