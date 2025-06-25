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

    <table id="students-table" class="table table-bordered table-hover table-striped">
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
@stop

@section('js')
    <!-- DataTables Core -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#students-table').DataTable({
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
                        filename: 'students',
                        title: 'Student Data (ODF Format)',
                        customizeData: function(data) {
                            // ODF simulasi dengan Excel
                        }
                    }
                ],
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries per page",
                    zeroRecords: "No matching students found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No students available",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });
        });
    </script>
@stop
