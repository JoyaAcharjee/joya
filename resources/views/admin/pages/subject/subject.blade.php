@extends('admin.layouts.single')
@section('emp')
<div class="col-md-12  mt-5">
    <h2 >All Subjects</h2>
    <a class="btn btn-primary " style="margin-bottom: 10px" href="{{URL::to('create-subject')}}">
        Create Subject</a>
    <table class="table table-striped table-bordered" style="text-align: center" id="myTable">
        <thead>
        <th>Subject Name</th>
        <th>Subject Code</th>
        <th>Subject Shortname</th>
        <th>Subject Type</th>
        <th>Action</th>
        </thead>
        <tbody>
            @foreach($subjects as $e)
                <tr>
                    <td>{{ $e->sub_name }}</td>
                    <td>{{ $e->sub_code }}</td>
                    <td>{{ $e->sub_shortname}}</td>
                    <td>{{ $e->sub_type }}</td>
                    <td >
                        <a class="btn btn-success" href="{{ URL::to('edit-subject/'.$e->id)}}" >
                            <i class="fas fa-edit "></i>Edit</a>
                        <a class="btn btn-danger" href=""data-toggle="modal" data-target="#myModal{{ $e->id }}">
                            <i class="fas fa-trash-alt "></i>Delete</a>
                        <div class="modal" id="myModal{{ $e->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure you want to delete <b>{{ $e->sub_type }}</b>??
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="{{ URL::to('delete-subject/'.$e->id) }}">Yes</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table
</div>

@stop
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        columnDefs: [
            {bSortable: false, targets: [4]}
        ],
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