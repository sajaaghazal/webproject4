@extends('layout.Admin')

@section('title', 'Edit Enrollment')

@section('content')
<div class="enrollments-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Enrollment</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('enrollment.index') }}">Enrollments</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('enrollment.show', $enrollment->id) }}">Details</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('enrollment.show', $enrollment->id) }}" class="btn btn-info me-2">
                <i class="fas fa-eye me-2"></i>View Details
            </a>
            <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student</label>
                        <select name="studentId" class="form-select" required>
                            <option value="">-- Select Student --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ old('studentId', $enrollment->studentId) == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} (ID: {{ $student->id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Course</label>
                        <select name="courseId" class="form-select" required>
                            <option value="">-- Select Course --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('courseId', $enrollment->courseId) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }} ({{ $course->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Professor</label>
                        <select name="professorId" class="form-select" required>
                            <option value="">-- Select Professor --</option>
                            @foreach($professors as $professor)
                                <option value="{{ $professor->id }}" {{ old('professorId', $enrollment->professorId) == $professor->id ? 'selected' : '' }}>
                                    {{ $professor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mark (0-100)</label>
                        <input type="number" name="mark" class="form-control" min="0" max="100" step="0.5" 
                               value="{{ old('mark', $enrollment->mark) }}" placeholder="e.g., 85.5">
                        <div class="form-text">Update the mark for this enrollment (0 to 100 scale)</div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('enrollment.show', $enrollment->id) }}" class="btn btn-secondary me-2">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <a href="{{ route('enrollment.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add New
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Enrollment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection