@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabrication
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">Fabrication</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Activity:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">--Recap Activity--</option>
                    <option id="1">Recap Material Process (Marking, Cutting, Bending)</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
          </div>
          </div>

          <div class="col-md-12">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
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
          </div>

          <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Material Process</h1>
              <table id="block" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Block</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress per Block</th>
                  <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Name of Block</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress per Block</td>
                  <td>View Detail</td>
                </tr>
                <tr>
                  <td>Name of Block</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress per Block</td>
                  <td>View Detail</td>
                </tr>
                <tr>
                  <td>Name of Block</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress per Block</td>
                  <td>View Detail</td>
                </tr>
                <tr>
                  <td>Name of Block</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress per Block</td>
                  <td>View Detail</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Block</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress per Block</th>
                  <th>View Detail</th>
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
    $('#block').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
