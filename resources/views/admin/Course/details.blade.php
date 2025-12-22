@if (isset($course))
<div class="card mb-4">
    <div class="card-header">
        <strong>Course Details</strong>
    </div>

    <div class="card-body">
        <p><strong>Course Name:</strong> {{ $course->name }}</p>
        <p><strong>Course Code:</strong> {{ $course->code }}</p>
        <p><strong>Department:</strong> {{ $course->department->name ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $course->status }}</p>

        <a href="{{ route('course.edit', $course) }}" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="{{ route('course.index') }}" class="btn btn-secondary btn-sm">
            Back
        </a>
    </div>
</div>
@endif
