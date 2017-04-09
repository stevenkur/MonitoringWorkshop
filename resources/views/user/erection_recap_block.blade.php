@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Join Block
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Erection</li>
        <li class="active">Recap Join Block</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

            <section class="col-lg-12">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipProject">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Ship Project List --</option>
                    <option id="1">Project 1</option>
                    <option id="2">Project 2</option>
                    <option id="3">Project 3</option>
                    <option id="4">Project 4</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
            </section>

        <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="machine" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Block 1</th>
                  <th>Block 2</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding<br>Finish/Total (m)</th>
                  <th>Date of Start</th>
                  <th>Date of Finish</th>
                  <th>Total Process</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding<br>Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Process</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding<br>Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Process</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding<br>Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Process</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding<br>Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Process</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Block 1</th>
                  <th>Block 2</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding<br>Finish/Total (m)</th>
                  <th>Date of Start</th>
                  <th>Date of Finish</th>
                  <th>Total Process</th>
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
