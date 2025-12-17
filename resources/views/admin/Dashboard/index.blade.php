@extends('layout.Admin')

@section('content')

<div class="dashboard-container">
    <h2>Welcome to the Administrator Dashboard</h2>
    <p>Overview of the Academic Management System.</p>

    {{-- Section 1: Key Statistics --}}
    <div class="stats-grid">

        {{-- Total Students --}}
        <div class="stat-card">
            <h3>Total Active Students</h3>
            <p class="stat-number">
                {{ $totalStudents ?? 'N/A' }}
            </p>
            <a href="{{ route('student.index') }}">View All Students</a>
        </div>

        {{-- Total Courses --}}
        <div class="stat-card">
            <h3>Total Courses Offered</h3>
            <p class="stat-number">
                {{ $totalCourses ?? 'N/A' }}
            </p>
            <a href="{{ route('course.index') }}">View All Courses</a>
        </div>

        {{-- Total Professors --}}
        <div class="stat-card">
            <h3>Total Faculty Members</h3>
            <p class="stat-number">
                {{ $totalProfessors ?? 'N/A' }}
            </p>
            <a href="{{ route('professor.index') }}">View All Professors</a>
        </div>

        {{-- Total Departments --}}
        <div class="stat-card">
            <h3>Academic Departments</h3>
            <p class="stat-number">
                {{ $totalDepartments ?? 'N/A' }}
            </p>
            <a href="{{ route('department.index') }}">View All Departments</a>
        </div>

    </div>

    <hr>

    {{-- Section 2: Recent Activity / Quick Actions --}}
    <div class="quick-links">
        <h3>Quick Actions</h3>
        <ul>
            <li>
                <a href="{{ route('enrollment.create') }}">
                    Enroll a Student in a Course
                </a>
            </li>
            <li>
                <a href="{{ route('course.create') }}">
                    Add a New Course
                </a>
            </li>
            <li>
                <a href="{{ route('student.create') }}">
                    Add a New Student
                </a>
            </li>
        </ul>
    </div>

</div>

@endsection
