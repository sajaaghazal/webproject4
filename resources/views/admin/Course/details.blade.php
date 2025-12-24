@extends('layout.Admin')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border p-4 bg-white" style="max-width: 700px; margin: auto;">
        <h2 class="mb-3">Course Details</h2>
        <hr>
        
        <div class="row mb-3">
            <div class="col-sm-4 fw-bold">Course Name:</div>
            <div class="col-sm-8">{{ $course->name }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4 fw-bold">Symbol:</div>
            <div class="col-sm-8"><span class="badge bg-dark">{{ $course->symbol }}</span></div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4 fw-bold">Units:</div>
            <div class="col-sm-8">{{ $course->unit }} Credits</div>
        </div>

        <div class="mt-4 border-top pt-3 text-end">
            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning">Edit Course</a>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection