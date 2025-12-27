@extends('layout.Admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Departments</h2>
        <a href="{{ route('department.create') }}" class="btn btn-primary">
            Add Department
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            @if($departments->isEmpty())
                <p class="text-muted mb-0">No departments available.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->symbol }}</td>
                                <td>
                                    <a href="{{ route('department.show', $department->id) }}" class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('department.destroy', $department->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this department?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>

</div>
@endsection