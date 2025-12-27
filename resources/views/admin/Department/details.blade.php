@extends('layout.Admin')

@section('content')
<div class="container">

    <h2 class="mb-4">Department Details</h2>

    <div class="card shadow-sm col-md-8">
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-sm-4 fw-bold">Department ID:</div>
                <div class="col-sm-8">{{ $department->id }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4 fw-bold">Department Name:</div>
                <div class="col-sm-8">{{ $department->name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4 fw-bold">Symbol:</div>
                <div class="col-sm-8">{{ $department->symbol }}</div>
            </div>

            <div class="mt-4">
                <a href="{{ route('department.index') }}" class="btn btn-secondary">
                    Back to List
                </a>

                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-warning">
                    Edit This Department
                </a>
            </div>

        </div>
    </div>

</div>
@endsection