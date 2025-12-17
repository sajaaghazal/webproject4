@extends('admin.layout')

<!-- @section('title', 'Add New Student') -->

@section('content')
    <!-- <div class="student-form-container">
        <h2>Add New Student</h2>

        {{-- Form submission route for creating a new student --}}
        <form action="{{ route('admin.student.store') }}" method="POST">
            @csrf 

            {{-- 1. Student Permanent ID Input --}}
            <div class="form-group">
                <label for="id_permanent">Student Permanent ID (e.g., Enrollment ID):</label>
                <input type="text" 
                       name="id_permanent" 
                       id="id_permanent" 
                       class="form-control" 
                       value="{{ old('id_permanent') }}"
                       required>
                @error('id_permanent')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- 2. First Name Input --}}
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" 
                       name="first_name" 
                       id="first_name" 
                       class="form-control" 
                       value="{{ old('first_name') }}"
                       required>
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- 3. Last Name Input --}}
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" 
                       name="last_name" 
                       id="last_name" 
                       class="form-control" 
                       value="{{ old('last_name') }}"
                       required>
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- 4. Date of Birth Input --}}
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" 
                       name="date_of_birth" 
                       id="date_of_birth" 
                       class="form-control" 
                       value="{{ old('date_of_birth') }}">
                @error('date_of_birth')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- 5. Department Selection (Foreign Key) --}}
            {{-- This requires the list of $departments to be passed from the backend --}}
            <div class="form-group">
                <label for="id_department">Major Department:</label>
                <select name="id_department" id="id_department" class="form-control" required>
                    <option value="">-- Select Department --</option>
                    @if (isset($departments))
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" 
                                    {{ old('id_department') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }} ({{ $department->id_permanent }})
                            </option>
                        @endforeach
                    @else
                         <option value="" disabled>Departments not loaded (Backend task)</option>
                    @endif
                </select>
                @error('id_department')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Student</button>
            
            <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>
    </div> -->
@endsection