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
      
    <?php 
        if(isset($_GET['id'])){
            foreach($worker as $workers){
                if($workers['ID']==$_GET['id']){
                    $name = $workers['NAME'];
                    $division = $workers['DIVISION'];
                    $position = $workers['POSITION'];
                    $nik = $workers['NIK'];
                    break;
                }
            }
            $flag=true;
        }
        else 
            $flag=false;
      ?>  
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-lg-4">
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            @if($flag)
                <form role="form" action="{{route('worker.update', $_GET['id'])}}" method="post">
                <input name="_method" type="hidden" value="PATCH">
            @else 
                <form role="form" action="{{route('worker.store')}}" method="post">
            @endif
                {{csrf_field()}}
              <div class="box-body">
                <h3> Register New Worker</h3>
                <div class="form-group">
                  <label for="inputWorker">Name of Worker:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter worker" <?php if($flag) echo 'value='."'$name'"; ?>>
                </div>
                <div class="form-group" >
                  <label for="inputDivision">Division:</label>
                  <select class="form-control" name="division">
                    <option value="#"  <?php if($flag&&$division=='#') echo 'selected'; ?> >--Select Division--</option>
                    <option id="1"  <?php if($flag&&$division=='SSH') echo 'selected'; ?>>SSH</option>
                    <option id="2" <?php if($flag&&$division=='Fabrication') echo 'selected'; ?>>Fabrication</option>
                    <option id="3" <?php if($flag&&$division=='Sub Assembly') echo 'selected'; ?>>Sub Assembly</option>
                    <option id="4" <?php if($flag&&$division=='Assembly') echo 'selected'; ?>>Assembly</option>
                    <option id="5" <?php if($flag&&$division=='BBS') echo 'selected'; ?>>BBS</option>
                    <option id="6" <?php if($flag&&$division=='Erection Process') echo 'selected'; ?>>Erection Process</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputPosition">Position:</label>
                  <input type="text" class="form-control" id="position" name="position" placeholder="Enter position" <?php if($flag) echo 'value='."'$position'"; ?>>
                </div>
                <div class="form-group">
                  <label for="inputNIK">NIK:</label>
                  <input type="text" class="form-control" id="nik" name="nik"  placeholder="Enter NIK" <?php if($flag) echo 'value='.$nik; ?>>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">
                    <?php if($flag) echo 'Update';
                        else echo 'Submit';?>  
                </button>
              </div>
            </form>
          </div>
        </section>
          
        <section class="col-lg-8">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <label for="viewWorker">Worker</label>
              <table id="workerTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NAME OF WORKER</th>
                  <th>DIVISION</th>
                  <th>POSITION</th>
                  <th>NIK</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($worker as $workers)
                <tr>
                    <td>{{$workers->NAME}}</td>
                    <td>{{$workers->DIVISION}}</td>
                    <td>{{$workers->POSITION}}</td>
                    <td>{{$workers->NIK}}</td>
                    <td>
                        <a class="btn btn-primary" type="submit" href="./worker?id={{$workers->ID}}">Edit</a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => 'worker/' . $workers->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>NAME OF WORKER</th>
                  <th>DIVISION</th>
                  <th>POSITION</th>
                  <th>NIK</th>
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
