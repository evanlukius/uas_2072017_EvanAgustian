@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Data Management Student</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalStudents }}</h3>
                <p>Total Students</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $studentsInPeriod }}</h3>
                <p>Students in Active Period</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>Welcome, {{ $user->name ?? 'Guest' }}!</h4>
        <p>Active Period: <strong>{{ $activePeriod->name ?? 'None' }}</strong></p>
        <p>Welcome to this beautiful admin panel.</p>

        {{-- Tombol menuju halaman daftar siswa --}}
        <a href="{{ route('students.index') }}" class="btn btn-primary mt-3 me-2">
            <i class="fas fa-users"></i> Manage Students
        </a>

        {{-- Tombol menuju halaman Period --}}
        <a href="{{ route('periods.index') }}" class="btn btn-info mt-3 me-2">
            <i class="fas fa-calendar-alt"></i> Manage Periods
        </a>

        {{-- Tombol menuju halaman Student Placement --}}
        <a href="{{ route('studentplacements.index') }}" class="btn btn-warning mt-3">
            <i class="fas fa-map-marker-alt"></i> Manage Student Placements
        </a>
    </div>
</div>
@stop

@section('css')
    {{-- Optional extra CSS --}}
@stop

@section('js')
    <script> console.log("AdminLTE dashboard loaded"); </script>
@stop
