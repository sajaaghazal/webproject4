@extends('layout.Home')

@section('title', 'Home - University Portal')

@section('content')
<div class="container mt-5">
    <div class="p-5 mb-4 bg-light rounded-3 border shadow-sm">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4 fw-bold text-primary">University Management Portal</h1>
            <p class="fs-4 text-muted">A streamlined platform for managing students, departments, and academic records.</p>
            <hr class="my-4">
            <p>Ready to manage the database? Log in to the admin panel to access the CRUD modules.</p>
            <a href="/adminLogin" class="btn btn-primary btn-lg px-5">Admin Login</a>
        </div>
    </div>

    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm text-center p-3">
                <div class="card-body">
                    <h3 class="h4">Department Management</h3>
                    <p class="text-muted">Create and update academic departments like Computer Science, Business, and Engineering.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm text-center p-3">
                <div class="card-body">
                    <h3 class="h4">Student Records</h3>
                    <p class="text-muted">Maintain a comprehensive list of all enrolled students and their personal details.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm text-center p-3">
                <div class="card-body">
                    <h3 class="h4">Course Enrollment</h3>
                    <p class="text-muted">Easily assign students to courses and link them with their respective professors.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection