@extends('adminlte::page')

@section('title', 'Student Placements')

@section('content_header')
    <h1>Student Placements</h1>
@stop

@section('content')
<div class="container">

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header & Add Button --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Placements List</h2>
        <a href="{{ route('studentplacements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Placement
        </a>
    </div>

    {{-- Filter by Period --}}
    <form method="GET" action="{{ route('studentplacements.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="period_id" class="form-control" onchange="this.form.submit()">
                    <option value="all">All Periods</option>
                    @foreach ($periods as $period)
                        <option value="{{ $period->id }}" {{ request('period_id') == $period->id ? 'selected' : '' }}>
                            {{ $period->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    {{-- Table --}}
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>NIM</th>
                <th>Name</th>
                <th>Class</th>
                <th>Period</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($placements as $placement)
                <tr>
                    <td>{{ $placement->student->nim ?? '-' }}</td>
                    <td>{{ $placement->student->name ?? '-' }}</td>
                    <td>{{ $placement->class }}</td>
                    <td>{{ $placement->period->name ?? '-' }}</td>
                    <td>
                        <form action="{{ route('studentplacements.destroy', $placement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this placement?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No placements found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@stop

@section('css')
    {{-- Optional custom CSS --}}
@stop

@section('js')
    <script> console.log("Student Placements page loaded"); </script>
@stop
