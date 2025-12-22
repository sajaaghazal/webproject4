@extends('layout.Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Department Management</h2>
        <a href="{{ url('/admin/Department/create') }}" class="btn btn-primary">+ Add New Department</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- This will be populated by your Controller using @foreach --}}
                    <tr>
                        <td>1</td>
                        <td>Computer Science</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info text-white">View</a>
                            <a href="#" class="btn btn-sm btn-warning text-white">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection