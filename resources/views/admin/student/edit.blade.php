@extends('layout.Admin')

@section('title', 'Edit Student')

@section('content')
<div class="students-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Student: {{ $student->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
                    <li class="breadcrumb-item active">Edit Details</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    {{-- Error and Success Alerts --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student Number <span class="text-danger">*</span></label>
                        <input type="text" name="stNo" class="form-control" value="{{ old('stNo', $student->stNo) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">University Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Average (GPA)</label>
                        <input type="number" name="avg" step="0.01" class="form-control" value="{{ old('avg', $student->avg) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter new password">
                        <div class="form-text">Security: Keep empty unless changing.</div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            @php $currentStatus = old('status', $student->status); @endphp
                            <option value="active" {{ $currentStatus == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="notActive" {{ $currentStatus == 'notActive' ? 'selected' : '' }}>Not Active</option>
                            <option value="dismissed" {{ $currentStatus == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                        </select>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('student.index') }}" class="btn btn-secondary me-2">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <a href="{{ route('student.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add New Student
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Student
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection