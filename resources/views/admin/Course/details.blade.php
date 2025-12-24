@extends('layout.Admin')

@section('title', $course->title . ' - Course Details')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-book-open me-2"></i>Course Details
                        </h4>
                        <span class="badge bg-light text-dark fs-6">{{ $course->code }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="mb-3">{{ $course->title }}</h2>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted">Course Code</h6>
                                <p class="h5">{{ $course->code }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted">Credit Hours</h6>
                                <span class="badge bg-primary fs-6">{{ $course->credits }} credits</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h6 class="text-muted">Description</h6>
                        <div class="card card-body bg-light">
                            @if($course->description)
                                {{ $course->description }}
                            @else
                                <em class="text-muted">No description provided</em>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted">Department</h6>
                                <p>
                                    @if($course->department)
                                        <span class="badge bg-secondary">{{ $course->department->name }}</span>
                                    @else
                                        <em class="text-muted">Not assigned</em>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted">Status</h6>
                                <span class="badge bg-success">Active</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            Created: {{ $course->created_at->format('F d, Y') }}
                        </small>
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i>
                            Last Updated: {{ $course->updated_at->format('M d, Y h:i A') }}
                        </small>
                    </div>
                </div>
            </div>
            
            @if($enrollments && count($enrollments) > 0)
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-users me-2"></i>Current Enrollments
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Enrollment Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enrollments as $enrollment)
                                        <tr>
                                            <td>{{ $enrollment->student->name ?? 'N/A' }}</td>
                                            <td>{{ $enrollment->enrolled_at->format('M d, Y') }}</td>
                                            <td>
                                                <span class="badge bg-info">Enrolled</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p class="text-muted small mb-0">
                            Total Students: {{ count($enrollments) }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-cogs me-2"></i>Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Course
                        </a>
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-list me-2"></i>Back to All Courses
                        </a>
                        
                        <hr>
                        
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger w-100" onclick="confirmDelete()">
                                <i class="fas fa-trash me-2"></i>Delete Course
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Quick Stats
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <h6 class="text-muted">Course Duration</h6>
                            <h3>{{ $course->credits * 15 }} hours</h3>
                            <small class="text-muted">({{ $course->credits }} credits × 15 hours/credit)</small>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-muted">Status</h6>
                                    <h4 class="text-success">Active</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="text-muted">Type</h6>
                                    <h4>Regular</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this course? This action cannot be undone.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endpush

@push('styles')
<style>
    .card-header {
        border-radius: 0.375rem 0.375rem 0 0 !important;
    }
    .badge.fs-6 {
        font-size: 1rem !important;
        padding: 0.5em 0.8em;
    }
    .bg-light.card-body {
        border-left: 4px solid #0dcaf0;
    }
    .btn {
        transition: all 0.3s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endpush