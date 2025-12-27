@extends('layout.Admin')

@section('title', 'Add Enrollment')

@section('content')
<div class="enrollments-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Add New Enrollment</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('enrollment.index') }}">Enrollments</a></li>
                    <li class="breadcrumb-item active">Add New</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('enrollment.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student <span class="text-danger">*</span></label>
                        <select name="studentId" class="form-select" required>
                            <option value="">-- Select Student --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ old('studentId') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} (ID: {{ $student->id }}) - {{ $student->email }}
                                </option>
                            @endforeach
                        </select>
                        @if($students->isEmpty())
                            <div class="text-danger small mt-1">No students available. Please add students first.</div>
                        @endif
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Course <span class="text-danger">*</span></label>
                        <select name="courseId" class="form-select" required>
                            <option value="">-- Select Course --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('courseId') == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }} ({{ $course->code }}) - {{ $course->professor->name ?? 'No Professor' }}
                                </option>
                            @endforeach
                        </select>
                        @if($courses->isEmpty())
                            <div class="text-danger small mt-1">No courses available. Please add courses first.</div>
                        @endif
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Professor <span class="text-danger">*</span></label>
                        <select name="professorId" class="form-select" required>
                            <option value="">-- Select Professor --</option>
                            @foreach($professors as $professor)
                                <option value="{{ $professor->id }}" {{ old('professorId') == $professor->id ? 'selected' : '' }}>
                                    {{ $professor->name }} - {{ $professor->department->name ?? 'No Department' }}
                                </option>
                            @endforeach
                        </select>
                        @if($professors->isEmpty())
                            <div class="text-danger small mt-1">No professors available. Please add professors first.</div>
                        @endif
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mark (0-100)</label>
                        <input type="number" name="mark" class="form-control" min="0" max="100" step="0.5" value="{{ old('mark') }}" placeholder="e.g., 85.5">
                        <div class="form-text">Optional - can be added later (0 to 100 scale)</div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-2"></i>Save Enrollment
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-redo me-2"></i>Reset Form
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection