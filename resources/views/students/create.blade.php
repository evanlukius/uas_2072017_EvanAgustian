@extends('adminlte::page')

@section('title', 'Add Student')

@section('content_header')
    <h1>Add New Student</h1>
@stop

@section('content')
<div class="container">
    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Back to Student List
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" 
                           id="nim" 
                           name="nim" 
                           class="form-control @error('nim') is-invalid @enderror" 
                           value="{{ old('nim') }}" 
                           maxlength="10" 
                           required>
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" 
                              name="address" 
                              class="form-control @error('address') is-invalid @enderror" 
                              rows="3" 
                              required>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" 
                           id="birth_date" 
                           name="birth_date" 
                           class="form-control @error('birth_date') is-invalid @enderror" 
                           value="{{ old('birth_date') }}" 
                           required>
                    @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" 
                           id="phone" 
                           name="phone" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           value="{{ old('phone') }}" 
                           required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo (optional)</label>
                    <input type="file" 
                           id="photo" 
                           name="photo" 
                           class="form-control @error('photo') is-invalid @enderror" 
                           accept="image/*">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save Student
                </button>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Optional extra CSS --}}
@stop

@section('js')
    <script> console.log("Student create page loaded"); </script>
@stop
