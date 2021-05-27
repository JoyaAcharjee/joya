<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h2>All Product</h2>
        <table class="table table-bordered" id="myTable">
            <thead>
            <th>ID</th>
            <th>Product </th>
            <th>Price </th>
            <th>Category </th>
            <th class="noExport">Edit</th>
            <th class="noExport">Delete</th>

            </thead>
            <tbody>
                @if($products)
                    @foreach($products as $p)
                        <tr>
                            <td>{{ $p->id }} </td>
                            <td>{{ $p->product }} </td>
                            <td>{{ $p->price }} </td>
                            <td>{{ $p->category }} </td>
                            <td><button class="btn btn-primary">Edit</button> </td>
                            <td><button class="btn btn-danger">Delete</button> </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
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
                {bSortable: false, targets: [4,5]}
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
</body>
</html>
