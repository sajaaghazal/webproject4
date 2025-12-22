@extends('layout.Admin')

@section('content')
<div class="course-list-container">
    <h2>Course Management</h2>

    {{-- Button to create a new course --}}
    <a href="{{ route('course.create') }}" class="btn btn-primary create-button">
        + Create New Course
    </a>

    {{-- Start of the Table Area --}}
    <div class="table-responsive mt-3">

        @if (isset($courses) && $courses->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->department->name ?? '-' }}</td>
                            <td>{{ $course->status }}</td>
                            <td>
                                {{-- View --}}
                                <a href="{{ route('course.show', $course) }}"
                                   class="btn btn-sm btn-info">
                                    View
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('course.edit', $course) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('course.destroy', $course->id) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete {{ $course->name }}?')">
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
                No courses have been added yet. Click "Create New Course" to begin.
            </div>
        @endif

    </div>
</div>
@endsection
