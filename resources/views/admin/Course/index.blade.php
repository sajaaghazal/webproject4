@extends('layout.Admin')

@section('title', 'Courses')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Course Management</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Course
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if($courses && $courses->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Credits</th>
                                <th scope="col">Department</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course['id'] ?? $course->id }}</td>
                                    <td><strong>{{ $course['code'] ?? $course->code }}</strong></td>
                                    <td>{{ $course['title'] ?? $course->title }}</td>
                                    <td>
                                        @if(!empty($course['description'] ?? $course->description))
                                            {{ Str::limit($course['description'] ?? $course->description, 50) }}
                                        @else
                                            <span class="text-muted">No description</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $course['credits'] ?? $course->credits }} credits</span>
                                    </td>
                                    <td>
                                        @php
                                            $deptId = $course['department_id'] ?? $course->department_id;
                                            if($deptId == 1) echo 'Computer Science';
                                            elseif($deptId == 2) echo 'Mathematics';
                                            elseif($deptId == 3) echo 'English';
                                            elseif($deptId == 4) echo 'Physics';
                                            else echo 'Not assigned';
                                        @endphp
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('courses.show', $course['id'] ?? $course->id) }}" 
                                               class="btn btn-info" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('courses.edit', $course['id'] ?? $course->id) }}" 
                                               class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('courses.destroy', $course['id'] ?? $course->id) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-book fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">No Courses Found</h4>
                    <p class="text-muted">Get started by adding your first course</p>
                    <a href="{{ route('courses.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add First Course
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection