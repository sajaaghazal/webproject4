@extends('layout.Admin')

@section('title', 'Edit Professor')

@section('content')
<div class="professors-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Professor</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('professor.index') }}">Professors</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('professor.show', $professor->id) }}">Details</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('professor.show', $professor->id) }}" class="btn btn-info me-2">
                <i class="fas fa-eye me-2"></i>View Details
            </a>
            <a href="{{ route('professor.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('professor.update', $professor->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $professor->name) }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $professor->email) }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter new password">
                        <div class="form-text">Leave empty to keep current password</div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <select name="depId" class="form-select" required>
                            <option value="">-- Select Department --</option>
                            @php
                                $departments = \App\Models\Department::all();
                                $currentDepId = old('depId', $professor->depId);
                            @endphp
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" 
                                    {{ $currentDepId == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }} ({{ $department->symbol }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('professor.show', $professor->id) }}" class="btn btn-secondary me-2">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <a href="{{ route('professor.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add New
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Professor
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection