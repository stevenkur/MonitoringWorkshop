@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Material Process
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Assembly</li>
        <li class="active">Recap Material Process</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipProject">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Ship Project List --</option>
                    
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

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Select BLock:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    
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

        <section class="col-md-12">
        <div class="box box-primary">

          <h3>Target per-Day: <br> [XX] Ton</h3>
          <br>  

        </div>
        </section>    

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Join Panel List</h3>
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Part 1</th>
                  <th>ID Part 2</th>
                  <th>Grade Part 1</th>
                  <th>Grade Part 2</th>
                  <th>Weight Part 1</th>
                  <th>Weight Part 2</th>
                  <th>Date of Work</th>
                  <th>Work Machine</th>
                  <th>Normal Hours of Machine</th>
                  <th>Activity</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Part 1</th>
                  <th>ID Part 2</th>
                  <th>Grade Part 1</th>
                  <th>Grade Part 2</th>
                  <th>Weight Part 1</th>
                  <th>Weight Part 2</th>
                  <th>Date of Work</th>
                  <th>Work Machine</th>
                  <th>Normal Hours of Machine</th>
                  <th>Activity</th>
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
    $('#plate').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
  });
</script>