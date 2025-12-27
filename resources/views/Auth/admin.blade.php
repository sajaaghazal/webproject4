@extends('layout.Home')

@section('title','Admin Login')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="container" style="max-width:540px">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Admin Login</div>
            <div class="card-body">
                @if(session('suceess'))
                    <div class="alert alert-success">{{ session('suceess') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.adminCheckLogin') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email', 'admin@limu.edu.ly') }}" required autofocus>
                        @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                        @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('home.index') }}" class="btn btn-link">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection