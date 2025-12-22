@extends('layout.Admin')

@section('content')
<div class="student-list-container">
    <h2>Student Management</h2>

    {{-- Button to create a new student --}}
    <a href="{{ route('student.create') }}" class="btn btn-primary create-button">
        + Enroll New Student
    </a>

    {{-- Start of the Table Area --}}
    <div class="table-responsive mt-3">

        {{-- Check if students exist --}}
        @if (isset($students) && $students->count())

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Permanent ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Major Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                    <form 
    action="{{ route('students.destroy', $student->id) }}" 
    method="POST" 
    style="display:inline;"
>
    @csrf
    @method('DELETE')

    <button 
        type="submit" 
        class="btn btn-danger btn-sm"
        onclick="return confirm('Are you sure you want to delete this student?')"
    >
        Delete
    </button>
</form>

                        <tr>
                            <td>{{ $student->id_permanent }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>
                                {{ $student->date_of_birth
                                    ? \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d')
                                    : 'N/A' }}
                            </td>
                            <td>
                                {{ $student->department->name ?? '-' }}
                            </td>
                            <td>
                                {{-- View --}}
                                <a href="{{ route('student.show', $student) }}"
                                   class="btn btn-sm btn-info">
                                    View
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('student.edit', $student) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('student.destroy', $student) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete {{ $student->last_name }}?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info">
                No student records found. Click "Enroll New Student" to begin.
            </div>
        @endif

    </div>
</div>
@endsection
