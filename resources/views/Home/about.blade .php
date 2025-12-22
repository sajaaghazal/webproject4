@extends('layout.Home')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4">About Our Portal</h2>
            <p class="lead text-muted">A modern solution for university administration.</p>
            <p>Our platform allows staff to manage departments, student enrollments, and course schedules efficiently. Built as a collaborative project, this portal demonstrates full CRUD functionality and modular design.</p>
        </div>
        <div class="col-lg-4 bg-light p-4 rounded border">
            <h4>Quick Stats</h4>
            <ul class="list-unstyled">
                <li><strong>5</strong> Departments</li>
                <li><strong>100+</strong> Active Students</li>
                <li><strong>20+</strong> Courses</li>
            </ul>
        </div>
    </div>
</div>
@endsection