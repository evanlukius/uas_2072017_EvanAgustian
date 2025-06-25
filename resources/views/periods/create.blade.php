@extends('adminlte::page')

@section('title', 'Add Period')

@section('content_header')
    <h1>Add New Period</h1>
@stop

@section('content')
<div class="container">
    <a href="{{ route('periods.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Back to Periods List
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('periods.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Period Name</label>
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
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" 
                           id="start_date" 
                           name="start_date" 
                           class="form-control @error('start_date') is-invalid @enderror" 
                           value="{{ old('start_date') }}" 
                           required>
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" 
                           id="end_date" 
                           name="end_date" 
                           class="form-control @error('end_date') is-invalid @enderror" 
                           value="{{ old('end_date') }}" 
                           required>
                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" 
                           id="active" 
                           name="active" 
                           class="form-check-input" 
                           {{ old('active') ? 'checked' : '' }}>
                    <label for="active" class="form-check-label">Active Period</label>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save Period
                </button>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Optional CSS --}}
@stop

@section('js')
    <script> console.log("Period create page loaded"); </script>
@stop
