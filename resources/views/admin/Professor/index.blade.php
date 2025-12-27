@extends('layout.Admin')

@section('title', 'Professors')

@section('content')
<div class="professors-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Professors</h2>
            <p class="text-muted">Manage all professors in the system</p>
        </div>
        <a href="{{ route('professor.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Professor
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($professors->isNotEmpty())
                            @foreach($professors as $professor)
                            <tr>
                                <td>{{ $professor->id }}</td>
                                <td>{{ $professor->name }}</td>
                                <td>{{ $professor->email }}</td>
                                <td>{{ $professor->department->name ?? 'N/A' }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('professor.show', $professor->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye me-1"></i>Details
                                        </a>
                                        <a href="{{ route('professor.edit', $professor->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('professor.destroy', $professor->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete {{ $professor->name }}?')">
                                                <i class="fas fa-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No professors found. <a href="{{ route('professor.create') }}">Add your first professor</a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection