@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input New Worker in Workshop
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Input Worker</li>
        <li class="active">Input New Worker in Workshop</li>
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
                <div class="form-group">
                  <label for="inputWorker">Name of Worker:</label>
                  <input type="text" class="form-control" id="worker" placeholder="Enter worker">
                </div>
                <div class="form-group">
                  <label for="inputDivision">Division:</label>
                  <select class="form-control">
                    <option id="#">--Select Division--</option>
                    <option id="1">SSH</option>
                    <option id="2">Fabrication</option>
                    <option id="3">Sub Assembly</option>
                    <option id="4">Assembly</option>
                    <option id="5">BBS</option>
                    <option id="6">Erection Process</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputPosition">Position:</label>
                  <input type="text" class="form-control" id="position" placeholder="Enter position">
                </div>
                <div class="form-group">
                  <label for="inputNIK">NIK:</label>
                  <input type="text" class="form-control" id="nik" placeholder="Enter NIK">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Input</button>
              </div>
            </form>
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