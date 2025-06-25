@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Data Management Student</h1>
@stop

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Student Data</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>NIM</th>
                <th>Name</th>
                <th>Address</th>
                <th>Birth Date</th>
                <th>Phone</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        @if ($student->photo)
                            <img src="{{ asset('storage/photos/' . $student->photo) }}" alt="Photo" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@stop

@section('css')
    {{-- Optional extra CSS --}}
@stop

@section('js')
    <script> console.log("AdminLTE dashboard loaded"); </script>
@stop
