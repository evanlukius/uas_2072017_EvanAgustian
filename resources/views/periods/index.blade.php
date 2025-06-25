@extends('adminlte::page')

@section('title', 'Student Placements')

@section('content_header')
    <h1>Student Placements</h1>
@stop

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Placements List</h2>
        <a href="{{ route('studentplacements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Placement
        </a>
    </div>

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

    <table id="placements-table" class="table table-bordered table-hover table-striped">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#placements-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'btn btn-info'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export ODF',
                        className: 'btn btn-secondary',
                        filename: 'student_placements',
                        title: 'Student Placements Data (ODF Format)'
                    }
                ],
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries per page",
                    zeroRecords: "No matching placements found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No placements available",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });
        });
    </script>
@stop
