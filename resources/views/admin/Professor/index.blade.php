@extends('layout.Admin')

@section('content')
<div class="container">
    <h2>Professors List</h2>

    <a href="{{ route('professor.create') }}" class="btn btn-primary mb-3">
        Add Professor
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($professors as $professor)
            <tr>
                <td>{{ $professor->name }}</td>
                <td>{{ $professor->email }}</td>
                <td>{{ $professor->department->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('professor.show', $professor) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('professor.edit', $professor) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('professor.destroy', $professor) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this professor?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
