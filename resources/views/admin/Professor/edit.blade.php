@extends('layout.Admin')

@section('title', 'Edit Professor')

@section('content')
<div class="professors-page professors-form">

    <div class="professors-hero">
        <div class="big-title">Edit</div>
        <div class="bar">
            <h3>Edit Professor</h3>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('professor.update', $professor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="professors-form-grid">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $professor->name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $professor->email) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password (leave empty to keep current)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <select name="depId" class="form-select">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ $professor->depId == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="students-actions">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('professor.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
