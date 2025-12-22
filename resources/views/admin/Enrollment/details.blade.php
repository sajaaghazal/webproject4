@extends('layout.Admin')

@section('content')
<div class="container mt-4">
    <h1>Enrollment Details</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $enrollment->id }}</p>
            <p><strong>Student:</strong> {{ $enrollment->student->name ?? 'N/A' }}</p>
            <p><strong>Course:</strong> {{ $enrollment->course->name ?? 'N/A' }}</p>
            <p><strong>Professor:</strong> {{ $enrollment->professor->name ?? 'N/A' }}</p>
            <p><strong>Mark:</strong> {{ $enrollment->mark ?? '-' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
