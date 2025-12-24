@extends('layout.Admin') 

@section('content')
<div class="container mt-5 shadow-sm p-4 border rounded bg-white"> 
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">Student Management</h2>
        <a href="{{ route('student.create') }}" class="btn btn-primary">
            Add New Student
        </a>
    </div>

    <table class="table table-hover border">
        <thead class="table-light">
            <tr>
                <th>Student No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->stNo }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ ucfirst($student->status) }}</td>
                    <td class="text-center">
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No students found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection