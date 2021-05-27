@extends('admin.layouts.single')
@section('emp')
<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-2">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                View Requested Course
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="myTable" width="90%" cellspacing="0">
                    <thead>
                        {{-- <th>id</th> --}}
                        <th>Session</th>
                        <th>Subject Name</th>
                        <th>Subject code</th>
                        <th>Short Name</th>
                        <th>Subject Type</th>
                        {{-- <th>Section</th> --}}
                        <th>Course Type</th>
                    </thead>
                    <tbody>
                    @foreach($courseArray as $e)
                    <tr>
                         <td>{{$e}} </td>



            </tr>

                    @endforeach

                    </tbody>

                </table>
            </div>
                </main>


@stop
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>t>
<script>
$(document).ready( function () {
$('#myTable').DataTable({

    dom: 'Blfrtip',
    buttons: [
        {
            extend: 'pdf',
            footer: true,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'csv',
            footer: false,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'excel',
            footer: false,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        }
    ]
});
} );
</script>


