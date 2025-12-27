@extends('layout.Admin')

@section('title', 'Enrollments')

@section('content')
<div class="enrollments-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Enrollments</h2>
            <p class="text-muted">Manage student course enrollments</p>
        </div>
        <a href="{{ route('enrollment.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Enrollment
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if($enrollments->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted mb-4">No enrollments found</p>
                <a href="{{ route('enrollment.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add First Enrollment
                </a>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Professor</th>
                            <th>Enrollment Date</th>
                            <th>Mark</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->id }}</td>
                            <td>
                                @if($enrollment->student)
                                    {{ $enrollment->student->name }} (ID: {{ $enrollment->student->id }})
                                @else
                                    <span class="text-danger">Student not found</span>
                                @endif
                            </td>
                            <td>
                                @if($enrollment->course)
                                    {{ $enrollment->course->name }} ({{ $enrollment->course->code }})
                                @else
                                    <span class="text-danger">Course not found</span>
                                @endif
                            </td>
                            <td>
                                @if($enrollment->professor)
                                    {{ $enrollment->professor->name }}
                                @else
                                    <span class="text-danger">Professor not found</span>
                                @endif
                            </td>
                            <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($enrollment->mark)
                                    <span class="badge bg-info">{{ $enrollment->mark }}/100</span>
                                @else
                                    <span class="text-muted">Not graded</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('enrollment.show', $enrollment->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye me-1"></i>Details
                                    </a>
                                    <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('enrollment.destroy', $enrollment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this enrollment?')">
                                            <i class="fas fa-trash me-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection