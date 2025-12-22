@extends('layout.Admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm col-md-6">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Department</h4>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="Computer Science" required>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/admin/Department" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection