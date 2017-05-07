@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Worker
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li class="active">Worker</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-lg-6">
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('worker.store')}}" method="post">
                {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputWorker">Name of Worker:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter worker">
                </div>
                <div class="form-group" >
                  <label for="inputDivision">Division:</label>
                  <select class="form-control" name="division">
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
                  <input type="text" class="form-control" id="position" name="position" placeholder="Enter position">
                </div>
                <div class="form-group">
                  <label for="inputNIK">NIK:</label>
                  <input type="text" class="form-control" id="nik" name="nik"  placeholder="Enter NIK">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Input</button>
              </div>
            </form>
          </div>
            </section>
          
        <section class="col-lg-6">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="workerTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Worker</th>
                  <th>Division</th>
                  <th>Position</th>
                  <th>NIK</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($worker as $workers)
                <tr>
                    <td>{{$workers->NAME}}</td>
                    <td>{{$workers->DIVISION}}</td>
                    <td>{{$workers->POSITION}}</td>
                    <td>{{$workers->NIK}}</td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Worker</th>
                  <th>Division</th>
                  <th>Position</th>
                  <th>NIK</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
    $('#workerTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
