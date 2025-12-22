@extends('Layout.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name"
                class="form-control" 
                value="{{ $student->name }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                class="form-control" 
                value="{{ $student->email }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="department_id">Department ID</label>
            <input 
                type="number" 
                name="department_id" 
                id="department_id"
                class="form-control" 
                value="{{ $student->department_id }}" 
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            Update Student
        </button>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection
