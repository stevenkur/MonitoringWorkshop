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
                  <select class="form-control" name="project">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $shipData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->PROJECT_NAME}}</option>
                    @endforeach
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

          <?php 
                if(isset($_GET['project']) && $_GET['project']!='#') 
                   $flagProject=true;
                else $flagProject=false;
            ?>
        
        <div class="col-md-12">
        <div class="box box-primary">
        
        <form role="form" action="" method="post">
        {{csrf_field()}}
        <div class="box-body">
        <h3>Progress Percentage</h3>
                <div class="form-group">
                  <label class="col-md-2"> Marking </label>
                  <label> : </label>
                  <input type="text" id="marking" name="marking" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-md-2"> Cutting </label>
                  <label> : </label>
                  <input type="text" id="cutting" name="cutting" placeholder="">
                  <label> % </label>
                </div>    
                <div class="form-group">
                  <label class="col-md-2"> Bending </label>
                  <label> : </label>
                  <input type="text" id="bending" name="bending" placeholder="">
                  <label> % </label>
                </div>             

            <div class="box-footer">
              <button type="reset" class="btn btn-ok">Reset</button>
              <button type="submit" class="btn btn-primary">Check</button>
            </div>
        </div>
        </form>

        </div>
        </div>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Block</th>
                  <th>Unfinished Marking</th>
                  <th>Finished Marking</th>
                  <th>Unfinished Cutting</th>
                  <th>Finished Cutting</th>
                  <th>Unfinished Bending</th>
                  <th>Finished Bending</th>
                  <th>Progress Activity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($progress as $prog)
                    @if($flagProject && $prog->ID_PROJECT==$_GET['project'])
                    <tr>
                      <td>{{$prog->BLOCK_NAME}}</td>
                      <td>{{$prog->NUM-$prog->MARKING}}</td>
                      <td>{{$prog->MARKING}}</td>
                      <td>{{($prog->NUM-$prog->CUTTING)}}</td>
                      <td>{{$prog->CUTTING}}</td>
                      <td>{{($prog->NUM-$prog->BLENDING)}}</td>
                      <td>{{$prog->BLENDING}}</td>
                      <td>{{($prog->MARKING+$prog->CUTTING+$prog->BLENDING)/(3*$prog->NUM).'%'}}</td>
                    </tr>
                    @elseif(!$flagProject)
                    <tr>
                      <td>{{$prog->BLOCK_NAME}}</td>
                      <td>{{$prog->NUM-$prog->MARKING}}</td>
                      <td>{{$prog->MARKING}}</td>
                      <td>{{($prog->NUM-$prog->CUTTING)}}</td>
                      <td>{{$prog->CUTTING}}</td>
                      <td>{{($prog->NUM-$prog->BLENDING)}}</td>
                      <td>{{$prog->BLENDING}}</td>
                      <td>{{($prog->MARKING+$prog->CUTTING+$prog->BLENDING)/(3*$prog->NUM).'%'}}</td>
                    </tr>
                    @endif
                @endforeach
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
    $('#tabel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
