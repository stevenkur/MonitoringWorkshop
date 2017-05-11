@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Machine
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li class="active">Machine</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-lg-4">
            <div class="box box-primary">
            
            <form role="form" action="{{route('machine.store')}}" method="post">
                <input name="_method" type="hidden" value="POST">
                {{csrf_field()}}
              <div class="box-body">
                  <h3> Add New Machine</h3>
                <div class="form-group">
                  <label for="inputMachine">Name of Machine:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of machine">
                </div>
                <div class="form-group">
                  <label for="inputActivity">Name of Activity:</label>
                  <input type="text" class="form-control" id="activity" name="activity" placeholder="Enter name of activity">
                </div>
                <div class="form-group">
                  <label for="inputWorkIn">Work in:</label>
                  <select class="form-control" name="workshop">
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
                  <label for="inputActivity">Capacity</label>
                  <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity of machine">
                </div>
                <div class="form-group">
                  <label for="inputOperational">Normal Operational Hour</label>
                  <input type="number" class="form-control" id="operational" name="operational" placeholder="Enter operational hour">
                </div>
                
              </div>

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Input</button>
              </div>
            </form>
          </div>
          </section>
          
        <section class="col-lg-8">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <label for="viewMachine">Machine</label>
              <table id="machineTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NAME OF MACHINE</th>
                  <th>ACTIVITY</th>
                  <th>WORKSHOP</th>
                  <th>OPERATIONAL HOUR</th>
                  <th>CAPACITY</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($machine as $machines)
                <tr>
                    <td>{{$machines->NAME}}</td>
                    <td>{{$machines->ACTIVITY}}</td>
                    <td>{{$machines->WORKSHOP}}</td>
                    <td>{{$machines->OPERATIONAL_HOUR}}</td>
                    <td>{{$machines->CAPACITY}}</td>
                    <td><a class="btn btn-primary" type="submit" href="">Edit</a></td>
                    <td>
                        {{ Form::open(array('url' => 'machine/' . $machines->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>NAME OF MACHINE</th>
                  <th>ACTIVITY</th>
                  <th>WORKSHOP</th>
                  <th>OPERATIONAL HOUR</th>
                  <th>CAPACITY</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
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
    $('#machineTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
});
</script>