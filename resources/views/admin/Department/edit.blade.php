@extends('layout.Admin')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Department</h2>

    <div class="card shadow-sm col-md-6">
        <div class="card-body">

            <form action="{{ route('department.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $department->name }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Symbol</label>
                    <input type="text"
                           name="symbol"
                           class="form-control"
                           value="{{ $department->symbol }}"
                           required>
                </div>

                <div class="mt-3">
                    <a href="{{ route('department.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection