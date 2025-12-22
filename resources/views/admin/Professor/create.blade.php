@extends('layout.Admin')

@section('title', 'Add Professor')

@section('content')
<div class="professors-page professors-form">

    <div class="professors-hero">
        <div class="big-title">Add</div>
        <div class="bar">
            <h3>Add Professor</h3>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('professor.store') }}" method="POST">
                @csrf

                <div class="professors-form-grid">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <select name="depId" class="form-select">
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('depId') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="students-actions">
                    <button class="btn btn-primary">Save</button>
                    <a href="{{ route('professor.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
