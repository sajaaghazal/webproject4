@extends('layout.Admin')

@section('content')
<div class="container mt-5 shadow-sm p-4 border rounded bg-white">
    <h2 class="mb-4">Add New Student</h2>
    
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="stNo" class="form-label">Student Number</label>
            <input type="text" name="stNo" id="stNo" class="form-control @error('stNo') is-invalid @enderror" value="{{ old('stNo') }}" required>
            @error('stNo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">University Email (@limu.edu.ly)</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="avg" class="form-label">Average (GPA)</label>
            <input type="number" name="avg" id="avg" step="0.01" class="form-control @error('avg') is-invalid @enderror" value="{{ old('avg') }}">
            @error('avg') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="notActive" {{ old('status') == 'notActive' ? 'selected' : '' }}>Not Active</option>
                <option value="dismissed" {{ old('status') == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save Student</button>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection