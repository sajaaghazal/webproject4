@extends('layout.Admin')

@section('title', 'Add Professor')

@section('content')
<div class="professors-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Add New Professor</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('professor.index') }}">Professors</a></li>
                    <li class="breadcrumb-item active">Add New</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('professor.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('professor.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <select name="depId" class="form-select" required>
                            <option value="">-- Select Department --</option>
                            @php
                                $departments = \App\Models\Department::all();
                            @endphp
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('depId') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }} ({{ $department->symbol }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('professor.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-2"></i>Save Professor
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-redo me-2"></i>Reset Form
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection