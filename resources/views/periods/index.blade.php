@extends('adminlte::page')

@section('title', 'Periods')

@section('content_header')
    <h1>Periods</h1>
@stop

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Periods List</h2>
        <a href="{{ route('periods.create') }}" class="btn btn-primary">+ Add Period</a>
    </div>

    <table id="periods-table" class="table table-bordered table-hover table-striped">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($periods as $period)
                <tr>
                    <td>{{ $period->name }}</td>
                    <td>{{ $period->start_date }}</td>
                    <td>{{ $period->end_date }}</td>
                    <td>
                        @if ($period->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No periods found.</td>
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
            $('#periods-table').DataTable({
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
                        filename: 'periods',
                        title: 'Periods Data (ODF Format)',
                        customizeData: function(data) {
                          
                        }
                    }
                ],
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries per page",
                    zeroRecords: "No matching periods found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No periods available",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });
        });
    </script>
@stop
