<div style="margin-top: 20px;"class="card">
    <div class="card-header">
      <h3 class="card-title">Historia operacji</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="dataTable" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Odbiorca/Nadawca</th>
          <th>Tytuł</th>
          <th>Numer rachunku</th>
          <th>Kwota</th>
          <th>Data</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($data2 as $item)
          <tr>
            @if($item->senderId == Auth::id())
            <td>{{ $item->receiverName }}</td>
            @else
              <td>{{ $item->senderName }}</td>
            @endif
            <td>{{ $item->title }}</td>
            @if($item->senderId == Auth::id())
            <td>{{ $item->receiverNumberAccount }}</td>
            @else
              <td>{{ $item->senderNumberAccount }}</td>
            @endif
            @if($item->senderId == Auth::id())
            <td style="color: red">-{{ $item->amount }}</td>
            @else
              <td style="color: rgb(11, 145, 33)">{{ $item->amount }}</td>
            @endif
            <td>{{ $item->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Odbiorca/Nadawca</th>
            <th>Tytuł</th>
            <th>Numer rachunku</th>
            <th>Kwota</th>
            <th>Data</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
$("#dataTable").DataTable({
"responsive": true, "lengthChange": false, "autoWidth": false,
"buttons": ["copy", "csv", "pdf"]
}).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>