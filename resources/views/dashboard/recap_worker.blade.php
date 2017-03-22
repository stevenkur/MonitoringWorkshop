@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Worker
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Input Worker</li>
        <li class="active">Recap Worker</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="machine" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Worker</th>
                  <th>Division</th>
                  <th>Position</th>
                  <th>NIP</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Name of Worker</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIP/Day</td>
                </tr>
                <tr>
                  <td>Name of Worker</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIP/Day</td>
                </tr><tr>
                  <td>Name of Worker</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIP/Day</td>
                </tr><tr>
                  <td>Name of Worker</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIP/Day</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Worker</th>
                  <th>Division</th>
                  <th>Position</th>
                  <th>NIP</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

      </div>
    </section>
  </div>

@stop

<!-- jQuery 2.2.3 -->
<script src="adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function() {
    $('#machine').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
