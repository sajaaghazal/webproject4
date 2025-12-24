@extends('layout.Admin')

@section('content')
<div class="container mt-5 shadow-sm p-4 border rounded bg-white" style="max-width: 600px;">
    <h2 class="mb-4">Add New Course</h2>
    
    <form action="{{ route('course.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Database Systems" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Symbol (Course Code)</label>
            <input type="text" name="symbol" class="form-control" placeholder="e.g. CS302" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Unit (Credits)</label>
            <input type="number" name="unit" class="form-control" placeholder="e.g. 3" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Save Course</button>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection