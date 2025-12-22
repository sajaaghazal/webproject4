@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Course</h2>

    <form action="{{ route('course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Course Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name', $course->name) }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label>Course Code</label>
            <input 
                type="text" 
                name="symbol" 
                class="form-control" 
                value="{{ old('symbol', $course->symbol) }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label>Course Unit</label>
            <input 
                type="text" 
                name="unit" 
                class="form-control" 
                value="{{ old('unit', $course->unit) }}" 
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            Update Course
        </button>
    </form>
</div>
@endsection
