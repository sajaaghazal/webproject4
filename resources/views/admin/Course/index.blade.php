@extends('layout.Admin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Course Management</h2>
        <a href="{{ route('course.create') }}" class="btn btn-primary px-4 shadow-sm">
            <i class="fas fa-plus"></i> Add New Course
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">Symbol (Code)</th>
                            <th>Course Name</th>
                            <th>Units</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                        <tr>
                            <td class="ps-4 fw-bold text-primary">{{ $course->symbol }}</td>
                            <td>{{ $course->name }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $course->unit }} Credits</span></td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-info text-white" title="View Details">
                                        View
                                    </a>
                                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-warning" title="Edit Course">
                                        Edit
                                    </a>
                                    <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')" title="Delete Course">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                No courses found. Click "Add New Course" to get started!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection