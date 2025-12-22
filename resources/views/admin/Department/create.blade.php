@extends('layout.Admin')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/Department">Departments</a></li>
            <li class="breadcrumb-item active">Add New</li>
        </ol>
    </nav>

    <div class="card shadow-sm col-md-6">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create Department</h4>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Computer Science" required>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/admin/Department" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">Save Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection