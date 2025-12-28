@extends('layout.Admin')

@section('content')

<div class="dashboard-container container-fluid py-4">
    <div class="mb-4">
        <h2 class="fw-bold">Welcome to the Administrator Dashboard</h2>
        <p class="text-muted">Overview of the Academic Management System.</p>
    </div>

    {{-- Section 1: Key Statistics --}}
    <div class="row g-4">

        {{-- Total Students --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted fw-bold">TOTAL ACTIVE STUDENTS</h6>
                    <h2 class="card-title fw-bold text-primary">{{ $totalStudents ?? 'N/A' }}</h2>
                    <a href="{{ route('student.index') }}" class="btn btn-sm btn-link ps-0">View All Students</a>
                </div>
            </div>
        </div>

        {{-- Total Courses --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted fw-bold">COURSES OFFERED</h6>
                    <h2 class="card-title fw-bold text-success">{{ $totalCourses ?? 'N/A' }}</h2>
                    <a href="{{ route('course.index') }}" class="btn btn-sm btn-link ps-0">View All Courses</a>
                </div>
            </div>
        </div>

        {{-- Total Professors --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted fw-bold">FACULTY MEMBERS</h6>
                    <h2 class="card-title fw-bold text-info">{{ $totalProfessors ?? 'N/A' }}</h2>
                    <a href="{{ route('professor.index') }}" class="btn btn-sm btn-link ps-0">View All Professors</a>
                </div>
            </div>
        </div>

        {{-- Total Departments --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted fw-bold">ACADEMIC DEPARTMENTS</h6>
                    <h2 class="card-title fw-bold text-warning">{{ $totalDepartments ?? 'N/A' }}</h2>
                    <a href="{{ route('department.index') }}" class="btn btn-sm btn-link ps-0">View All Departments</a>
                </div>
            </div>
        </div>

    </div>

    <hr class="my-5">

    {{-- Section 2: Quick Actions --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h4 class="fw-bold mb-4">Quick Actions</h4>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('enrollment.create') }}" class="btn btn-primary px-4">
                    Enroll a Student
                </a>
                <a href="{{ route('course.create') }}" class="btn btn-outline-secondary px-4">
                    Add a New Course
                </a>
                <a href="{{ route('student.create') }}" class="btn btn-outline-secondary px-4">
                    Add a New Student
                </a>
            </div>
        </div>
    </div>

</div>

@endsection