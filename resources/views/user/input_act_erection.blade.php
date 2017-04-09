@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Erection
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Erection</li>
        <li class="active">Input Activities & Worker</li>
      </ol>
    </section>

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

      <section class="col-lg-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" name="joinblock">
              <div class="box-body">
              <label>Select Block to Join:</label>
              <div class="row">
                <div class="col-lg-6">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    <option id="1">Block 1</option>
                    <option id="2">Block 2</option>
                    <option id="3">Block 3</option>
                    <option id="4">Block 4</option>
                  </select>
                </div>
                <div class="col-lg-6">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    <option id="1">Block 1</option>
                    <option id="2">Block 2</option>
                    <option id="3">Block 3</option>
                    <option id="4">Block 4</option>
                  </select>
                </div>  
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
            
            <form role="form">
              <div class="box-body">
                  <h4> Percentage Progress:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Loading: </label>
                  <input type="text" id="loading" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Adjusting: </label>
                  <input type="text" id="adjusting" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Fitting: </label>
                  <input type="text" id="fitting" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Welding: </label>
                  <input type="text" id="welding" placeholder="">
                  <label> % </label>
                </div>

              <h4> Finished Process:</h4>
              <div class="form-group">
                  <label class="col-lg-3"> Loading: </label>
                  <input type="checkbox" id="loading_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Adjusting: </label>
                  <input type="checkbox" id="adjusting_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Fitting: </label>
                  <input type="checkbox" id="fitting_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Welding: </label>
                  <input type="checkbox" id="welding_finished" placeholder="">
                </div>

                <h4> Welding Process:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Length of join: </label>
                  <input type="text" id="lengthjoin" placeholder="">
                  <label> m </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Finished Wield: </label>
                  <input type="text" id="finishedwield" placeholder="">
                  <label> m </label>
                </div>

                <h4> Duration:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Day of Start Work: </label>
                  <input type="date" id="start" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Day of Finish Work: </label>
                  <input type="date" id="finish" placeholder="">
                </div>

            </form>

            <div class="box-footer">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Finish</button>
            </div>
          </div>
        </section>

        <section class="col-lg-6">
            <div class="box box-primary">
            
            <form role="form">
              <div class="box-body">
                  <h4> Detail Worker and Time:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Loading: </label>
                  <input type="text" id="loading" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Adjusting: </label>
                  <input type="text" id="adjusting" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Fitting: </label>
                  <input type="text" id="fitting" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Welding: </label>
                  <input type="text" id="welding" placeholder="">
                  <label> % </label>
                </div>

              <h4> Finished Process:</h4>
              <div class="form-group">
                  <label class="col-lg-3"> Loading: </label>
                  <input type="checkbox" id="loading_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Adjusting: </label>
                  <input type="checkbox" id="adjusting_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Fitting: </label>
                  <input type="checkbox" id="fitting_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Welding: </label>
                  <input type="checkbox" id="welding_finished" placeholder="">
                </div>

                <h4> Welding Process:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Length of join: </label>
                  <input type="text" id="lengthjoin" placeholder="">
                  <label> m </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Finished Wield: </label>
                  <input type="text" id="finishedwield" placeholder="">
                  <label> m </label>
                </div>

                <h4> Duration:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Day of Start Work: </label>
                  <input type="date" id="start" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Day of Finish Work: </label>
                  <input type="date" id="finish" placeholder="">
                </div>

            </form>

            <div class="box-footer">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Finish</button>
            </div>
          </div>
        </section>

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
    $('#assemblypart').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
