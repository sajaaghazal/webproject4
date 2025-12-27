@extends('layout.Admin')

@section('title', 'Professor Details')

@section('content')
<div class="professors-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Professor Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('professor.index') }}">Professors</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('professor.edit', $professor->id) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Edit Professor
            </a>
            <a href="{{ route('professor.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>Professor Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Professor ID</label>
                            <p class="h5">{{ $professor->id }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Full Name</label>
                            <p class="h5">{{ $professor->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Email Address</label>
                            <p class="h5">{{ $professor->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Department</label>
                            <p class="h5">{{ $professor->department->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Status</label>
                            <p class="h5"><span class="badge bg-success">Active</span></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Account Created</label>
                            <p class="h5">{{ $professor->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('professor.edit', $professor->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Professor
                        </a>
                        <a href="{{ route('professor.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list me-2"></i>View All Professors
                        </a>
                        <a href="{{ route('professor.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add New Professor
                        </a>
                        <form action="{{ route('professor.destroy', $professor->id) }}" method="POST" class="d-grid">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this professor?')">
                                <i class="fas fa-trash me-2"></i>Delete Professor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card shadow-sm mt-3">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Record Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <small class="text-muted">Created:</small>
                        <p class="mb-0">{{ $professor->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                    <div>
                        <small class="text-muted">Last Updated:</small>
                        <p class="mb-0">{{ $professor->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection