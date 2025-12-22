@extends('layout.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center">
                        Add New Course
                    </h3>

                    {{-- Back to index button --}}
                    <a href="{{ route('course.index') }}" class="btn btn-secondary mb-3">
                        Back to Course List
                    </a>

                    <form action="{{ route('course.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Course Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control"
                                placeholder="e.g. Data Structures"
                                required
                                value="{{ old('name') }}"
                            >
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Course Unit</label>
                            <input 
                                type="text" 
                                name="unit" 
                                class="form-control"
                                placeholder="e.g. 3 credits"
                                required
                                value="{{ old('unit') }}"
                            >
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Save Course
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
