@extends('layout.Admin')

@section('content')
<div class="container">

    <h2 class="mb-4">Add Department</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('department.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Symbol</label>
                    <input type="text"
                           name="symbol"
                           class="form-control"
                           required>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>

                    <a href="{{ route('department.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection