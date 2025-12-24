@extends('layout.Admin')

@section('title', 'Edit Course: ' . $course->title)

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Course: {{ $course->code }}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="code" class="form-label">
                                    <strong>Course Code *</strong>
                                </label>
                                <input type="text" 
                                       class="form-control @error('code') is-invalid @enderror" 
                                       id="code" 
                                       name="code" 
                                       value="{{ old('code', $course->code) }}"
                                       placeholder="e.g., CS101"
                                       required>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="title" class="form-label">
                                    <strong>Course Title *</strong>
                                </label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $course->title) }}"
                                       placeholder="e.g., Introduction to Programming"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <strong>Description</strong>
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="5">{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="credits" class="form-label">
                                    <strong>Credit Hours *</strong>
                                </label>
                                <select class="form-select @error('credits') is-invalid @enderror" 
                                        id="credits" 
                                        name="credits" 
                                        required>
                                    @for($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}" {{ (old('credits', $course->credits) == $i) ? 'selected' : '' }}>
                                            {{ $i }} credit{{ $i > 1 ? 's' : '' }}
                                        </option>
                                    @endfor
                                </select>
                                @error('credits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="department_id" class="form-label">
                                    <strong>Department</strong>
                                </label>
                                <select class="form-select @error('department_id') is-invalid @enderror" 
                                        id="department_id" 
                                        name="department_id">
                                    <option value="">Select Department (Optional)</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ (old('department_id', $course->department_id) == $department->id) ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary me-2">
                                    <i class="fas fa-arrow-left me-1"></i> Cancel
                                </a>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Update Course
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card mt-3 shadow-sm border-warning">
                <div class="card-body">
                    <h6 class="text-muted mb-3">
                        <i class="fas fa-history me-1"></i> Course Information:
                    </h6>
                    <div class="row small text-muted">
                        <div class="col-md-6">
                            <p><strong>Created:</strong> {{ $course->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $course->updated_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-header.bg-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
    }
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
</style>
@endpush