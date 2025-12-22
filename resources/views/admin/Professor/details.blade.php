@extends('Admin.layout')

@section('content')
<div class="container">
    <h2>Professor Details</h2>

    <p><strong>Name:</strong> {{ $professor->name }}</p>
    <p><strong>Email:</strong> {{ $professor->email }}</p>
    <p><strong>Department:</strong> {{ $professor->department->name ?? 'N/A' }}</p>

    <a href="{{ route('professor.index') }}" class="btn btn-secondary">
        Back
    </a>
</div>
@endsection
