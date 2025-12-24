@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border p-4 bg-white">
        <h2 class="mb-3">Student Profile</h2>
        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <p><strong>Student Number:</strong> {{ $student->stNo }}</p>
                <p><strong>Full Name:</strong> {{ $student->name }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>GPA:</strong> <span class="badge bg-light text-dark border">{{ $student->avg ?? 'N/A' }}</span></p>
                <p><strong>Status:</strong> 
                    <span class="badge {{ $student->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($student->status) }}
                    </span>
                </p>
            </div>
        </div>

        <div class="mt-4 border-top pt-3">
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">
                Edit Profile
            </a>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection