@extends('adminlte::page')

@section('title', 'Add Student Placement')

@section('content_header')
    <h1>Add Student Placement</h1>
@stop

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('placements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="period_id" class="form-label">Select Period</label>
            <select name="period_id" id="period_id" class="form-control" required>
                <option value="">-- Select Period --</option>
                @foreach ($periods as $period)
                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="student-placement-list">
            <div class="student-placement-item row mb-3">
                <div class="col-md-5">
                    <label>Student</label>
                    <select name="student_nims[]" class="form-control" required>
                        <option value="">-- Select Student --</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->nim }}">{{ $student->nim }} - {{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Class</label>
                    <input type="text" name="class" class="form-control" required maxlength="5">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-student">
                        <i class="fas fa-minus"></i> Remove
                    </button>
                </div>
            </div>
        </div>

        <button type="button" id="add-student" class="btn btn-secondary mb-3">
            <i class="fas fa-plus"></i> Add Another Student
        </button>

        <div>
            <button type="submit" class="btn btn-primary">Save Placements</button>
            <a href="{{ route('placements.index') }}" class="btn btn-default">Cancel</a>
        </div>
    </form>
</div>
@stop

@section('js')
<script>
    document.getElementById('add-student').addEventListener('click', function () {
        const list = document.getElementById('student-placement-list');
        const item = document.querySelector('.student-placement-item');
        const clone = item.cloneNode(true);

        // Clear values in clone
        clone.querySelector('select').value = '';
        clone.querySelector('input').value = '';

        list.appendChild(clone);
    });

    // Delegate remove button
    document.addEventListener('click', function (e) {
        if (e.target.closest('.remove-student'))
