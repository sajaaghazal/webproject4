@extends('admin.layout')

<!-- @section('title', 'Student Details: ' . $student->last_name) -->

@section('content')
    <!-- <div class="student-details-container">
        <h2>Student Details</h2>

        <div class="card">
            <div class="card-header">
                <h3>{{ $student->first_name }} {{ $student->last_name }}</h3>
            </div>
            <div class="card-body">
                
                {{-- Detail Item: Permanent ID --}}
                <p><strong>Permanent ID:</strong> {{ $student->id_permanent }}</p>
                
                {{-- Detail Item: Database ID --}}
                <p><strong>Database ID:</strong> {{ $student->id }}</p>

                {{-- Detail Item: Date of Birth --}}
                <p><strong>Date of Birth:</strong> {{ $student->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('M d, Y') : 'N/A' }}</p>

                {{-- Detail Item: Department (Assumes relationship exists) --}}
                <p>
                    <strong>Major Department:</strong> 
                    @if ($student->department)
                        <a href="{{ route('admin.department.details', $student->department) }}">
                            {{ $student->department->name }} ({{ $student->department->id_permanent }})
                        </a>
                    @else
                        N/A (Department not assigned)
                    @endif
                </p>
                
                {{-- Detail Item: Enrollment Date --}}
                <p><strong>Enrolled On:</strong> {{ $student->created_at->format('M d, Y') }}</p>
                
                {{-- Detail Item: Last Updated --}}
                <p><strong>Last Updated:</strong> {{ $student->updated_at->format('M d, Y H:i A') }}</p>

            </div>
            <div class="card-footer">
                {{-- Action Button: Edit --}}
                <a href="{{ route('admin.student.edit', $student) }}" class="btn btn-primary">
                    Edit Student Details
                </a>

                {{-- Action Button: Back to List --}}
                <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">
                    Back to List
                </a>

                {{-- Action Form: Delete --}}
                <form action="{{ route('admin.student.destroy', $student) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student record?')">
                        Delete Student
                    </button>
                </form>
            </div>
        </div>
    </div> -->
@endsection