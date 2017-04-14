@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Progress & Activity
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Fabrication</li>
        <li class="active">Recap Progress & Activity</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

            <section class="col-md-12">
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
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Block</th>
                  <th>Last Date of Work</th>
                  <th>Finished Blasting</th>
                  <th>Finished ShopPrimer</th>
                  <th>Not Yet Processed</th>
                  <th>Progress Activity</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Name</td>
                  <td>Date</td>
                  <td>102</td>
                  <td>90</td>
                  <td>3</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>Date</td>
                  <td>102</td>
                  <td>90</td>
                  <td>3</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>Date</td>
                  <td>102</td>
                  <td>90</td>
                  <td>3</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>Date</td>
                  <td>102</td>
                  <td>90</td>
                  <td>3</td>
                  <td>90%</td>
                </tr>
                </tbody>
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
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true
    });
  });
</script>
