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
        <li><i class="fa fa-dashboard"></i>Home</li>
        <li class="active">Machine</li>
      </ol>
    </section>
        
      <?php  
      if(isset($_GET['id'])){
        foreach($machine as $machines){
            if($machines['ID']==$_GET['id']){
                $name = $machines['NAME'];
                $activity = $machines['ACTIVITY'];
                $workshop = $machines['WORKSHOP'];
                $capacity = $machines['CAPACITY'];
                $operational = $machines['OPERATIONAL_HOUR'];
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
            @if($flag)
                <form role="form" action="{{route('machine.update', $_GET['id'])}}" method="post">
                <input name="_method" type="hidden" value="PATCH">
            @else 
                <form role="form" action="{{route('machine.store')}}" method="post">
                <input name="_method" type="hidden" value="POST">
            @endif
                {{csrf_field()}}
              <div class="box-body">
                  @if($flag)
                  <h3> Update Machine '<?php echo $name; ?>' </h3>
                  @else
                  <h3> Add New Machine</h3>
                  @endif
                <div class="form-group">
                  <label for="inputMachine">Name of Machine:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of machine" size=50 <?php if($flag) echo 'value='."'$name'";?>>
                </div>
                <div class="form-group">
                  <label for="inputActivity">Name of Activity:</label>
                  <input type="text" class="form-control" id="activity" name="activity" placeholder="Enter name of activity" <?php if($flag) echo 'value='."'$activity'";?>>
                </div>
                <div class="form-group">
                  <label for="inputWorkIn">Work in:</label>
                  <select class="form-control" name="workshop">
                    <option value="#"  <?php if($flag&&$workshop=='#') echo 'selected'; ?> >--Select Division--</option>
                    <option id="1"  <?php if($flag&&$workshop=='SSH') echo 'selected'; ?>>SSH</option>
                    <option id="2" <?php if($flag&&$workshop=='Fabrication') echo 'selected'; ?>>Fabrication</option>
                    <option id="3" <?php if($flag&&$workshop=='Sub Assembly') echo 'selected'; ?>>Sub Assembly</option>
                    <option id="4" <?php if($flag&&$workshop=='Assembly') echo 'selected'; ?>>Assembly</option>
                    <option id="5" <?php if($flag&&$workshop=='BBS') echo 'selected'; ?>>BBS</option>
                    <option id="6" <?php if($flag&&$workshop=='Erection Process') echo 'selected'; ?>>Erection Process</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputActivity">Capacity (min/ton)</label>
                  <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity of machine" <?php if($flag) echo 'value='.$capacity; ?>>
                </div>
                <div class="form-group">
                  <label for="inputOperational">Normal Operational Hour (hour)</label>
                  <input type="text" class="form-control" id="operational" name="operational" placeholder="Enter operational hour" <?php if($flag) echo 'value='.$operational; ?>>
                </div>
                
              </div>

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
              <label for="viewMachine">Machine</label>
              <table id="machineTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NAME OF MACHINE</th>
                  <th>ACTIVITY</th>
                  <th>WORKSHOP</th>
                  <th>OPERATIONAL HOUR (hour)</th>
                  <th>CAPACITY (min/ton)</th>
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
                    <td>
                        <a class="btn btn-primary" type="submit" href="./machine?id={{$machines->ID}}">Edit</a>
                    </td>
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
                  <th>OPERATIONAL HOUR (hour)</th>
                  <th>CAPACITY (min/ton)</th>
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
<script src="public/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="public/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="public/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="public/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="public/adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/adminlte/dist/js/demo.js"></script>
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