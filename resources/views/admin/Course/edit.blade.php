@extends('layout.Admin')

@section('title', 'Edit Course')

@section('content')
<div class="courses-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Course</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Course Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Symbol <span class="text-danger">*</span></label>
                        <input type="text" name="symbol" class="form-control" value="{{ old('symbol', $course->symbol) }}" placeholder="e.g. CS101" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Units/Credits <span class="text-danger">*</span></label>
                        <input type="number" name="unit" class="form-control" value="{{ old('unit', $course->unit) }}" required>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('course.index') }}" class="btn btn-secondary me-2">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <a href="{{ route('course.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add New Course
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Course
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection