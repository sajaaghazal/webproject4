@extends('layout.Admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Enrollment</h1>

    <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="studentId" class="form-label">Student</label>
            <select name="studentId" id="studentId" class="form-control">
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $enrollment->studentId == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
            @error('studentId') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="courseId" class="form-label">Course</label>
            <select name="courseId" id="courseId" class="form-control">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $enrollment->courseId == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('courseId') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="professorId" class="form-label">Professor</label>
            <select name="professorId" id="professorId" class="form-control">
                <option value="">Select Professor</option>
                @foreach($professors as $professor)
                    <option value="{{ $professor->id }}" {{ $enrollment->professorId == $professor->id ? 'selected' : '' }}>
                        {{ $professor->name }}
                    </option>
                @endforeach
            </select>
            @error('professorId') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="mark" class="form-label">Mark (optional)</label>
            <input type="number" name="mark" id="mark" class="form-control" value="{{ $enrollment->mark }}" min="0" max="100">
            @error('mark') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Enrollment</button>
        <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
