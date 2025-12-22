@extends('Layout.app')

@section('content')
<div class="container">
    <h2>Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name"
                class="form-control" 
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
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Save Student
        </button>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection
