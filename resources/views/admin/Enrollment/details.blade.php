@extends('layout.Admin')

@section('title', 'Enrollment Details')

@section('content')
<div class="enrollments-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Enrollment Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('enrollment.index') }}">Enrollments</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Edit Enrollment
            </a>
            <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-link me-2"></i>Enrollment Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Enrollment ID</label>
                            <p class="h5">{{ $enrollment->id }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Enrollment Date</label>
                            <p class="h5">{{ $enrollment->created_at->format('F d, Y') }}</p>
                        </div>
                        
                        <div class="col-12 mb-4">
                            <hr>
                            <h5 class="mb-3">Student Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Student Name</label>
                                    <p class="h6">{{ $enrollment->student->name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Student ID</label>
                                    <p class="h6">{{ $enrollment->studentId ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Email</label>
                                    <p class="h6">{{ $enrollment->student->email ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Department</label>
                                    <p class="h6">{{ $enrollment->student->department->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 mb-4">
                            <hr>
                            <h5 class="mb-3">Course Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Course Name</label>
                                    <p class="h6">{{ $enrollment->course->name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Course Code</label>
                                    <p class="h6">{{ $enrollment->course->code ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Credits</label>
                                    <p class="h6">{{ $enrollment->course->credits ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Description</label>
                                    <p class="h6">{{ $enrollment->course->description ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 mb-4">
                            <hr>
                            <h5 class="mb-3">Professor Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Professor Name</label>
                                    <p class="h6">{{ $enrollment->professor->name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Email</label>
                                    <p class="h6">{{ $enrollment->professor->email ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label text-muted">Department</label>
                                    <p class="h6">{{ $enrollment->professor->department->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Mark</label>
                            <p class="h5">
                                @if($enrollment->mark)
                                    <span class="badge bg-info fs-6">{{ $enrollment->mark }}/100</span>
                                @else
                                    <span class="text-muted">Not graded</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Enrollment
                        </a>
                        <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list me-2"></i>View All Enrollments
                        </a>
                        <a href="{{ route('enrollment.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add New Enrollment
                        </a>
                        <form action="{{ route('enrollment.destroy', $enrollment->id) }}" method="POST" class="d-grid">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?')">
                                <i class="fas fa-trash me-2"></i>Delete Enrollment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card shadow-sm mt-3">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Record Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">Created:</small>
                        <p class="mb-0">{{ $enrollment->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                    <div>
                        <small class="text-muted">Last Updated:</small>
                        <p class="mb-0">{{ $enrollment->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection