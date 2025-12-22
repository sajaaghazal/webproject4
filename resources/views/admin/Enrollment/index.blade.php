@extends('layout.Admin')

@section('content')
<div class="container mt-4">
    <h1>Enrollments</h1>
    <a href="{{ route('enrollment.create') }}" class="btn btn-primary mb-3">Add Enrollment</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Professor</th>
                        <th>Mark</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>{{ $enrollment->student->name ?? 'N/A' }}</td>
                        <td>{{ $enrollment->course->name ?? 'N/A' }}</td>
                        <td>{{ $enrollment->professor->name ?? 'N/A' }}</td>
                        <td>{{ $enrollment->mark ?? '-' }}</td>
                        <td>
                            <a href="{{ route('enrollment.show', $enrollment->id) }}" class="btn btn-info btn-sm">Details</a>
                            <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('enrollment.destroy', $enrollment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No enrollments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($enrollments->hasPages())
        <div class="card-footer d-flex justify-content-center">
            {{ $enrollments->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
