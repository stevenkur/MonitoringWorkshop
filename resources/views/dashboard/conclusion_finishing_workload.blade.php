@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Conclusion to Finishing Workload
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Planning Production</li>
        <li class="active">Conclusion to Finishing Workload</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->            
            <form class="form">
            <div class="box-body">
              <label for="inputActivity">Select Workshop:</label>
                <div class="form-group">
                  <select class="form-control" name="id">
                    <option value="#">-- Workshop List --</option>
                    <option value="1">SSH Workshop</option>
                    <option value="2">Fabrication Workshop</option>
                    <option value="3">Sub Assembly Workshop</option>
                    <option value="4">Assembly Workshop</option>
                    <option value="5">BBS Workshop</option>
                    <option value="6">Erection Process</option>                    
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button method="post" class="btn btn-primary">Choose</button>
              </div>
            </form>

        </div>
        </div>

        <div class="col-lg-12">
        <div class="box box-primary">
         
            <div class="form-group" align="right">
              <label class="col-lg-10"> <h3><b>Total Workload All Project</b></h3> </label>
              <label class="col-lg-1"> <h3><b>:</b></h3> </label>
              <label> <h3><b>XXX ton</b></h3> </label>
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
<!-- ChartJS 1.0.1 -->
<script src="adminlte/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>