@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Total Ship Progress
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li class="active">Total Ship Progress</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <!-- /.box-header -->
          <!-- form start -->  
          <div class="col-md-12">
          <div class="box box-primary">
          <div class="box-body">
              <label for="viewPanel">Panel List</label>
              <table id="panel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SHIP NAME</th>
                  <th>PROGRESS</th>
                  <th>START PROJECT</th>
                  <th>TARGET FINISH</th>
                  <th>LAST DATE WORKED</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ship as $ships)
                <tr>
                    <td>{{$ships->PROJECT_NAME}}</td>
                    <td>{{number_format($ships->PROGRESS,'2','.','')}}</td>
                    <td>{{$ships->START}}</td>
                    <td>{{$ships->FINISH}}</td>
                    <td>---</td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SHIP NAME</th>
                  <th>PROGRESS</th>
                  <th>START PROJECT</th>
                  <th>TARGET FINISH</th>
                  <th>LAST DATE WORKED</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
          </div>
          </div>
    </section>
  </div>

@stop
<!-- jQuery 2.2.3 -->
<script src="public/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="public/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="public/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="public/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="public/adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function() {
    $('#panel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>