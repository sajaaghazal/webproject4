@extends('layout.Admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm col-md-8">
        <div class="card-body">
            <h2 class="card-title">Department Details</h2>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4 fw-bold">Department ID:</div>
                <div class="col-sm-8">1</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-bold">Department Name:</div>
                <div class="col-sm-8">Computer Science</div>
            </div>
            <div class="mt-4">
                <a href="/admin/Department" class="btn btn-secondary">Back to List</a>
                <a href="#" class="btn btn-warning">Edit This Department</a>
            </div>
        </div>
    </div>
</div>
@endsection