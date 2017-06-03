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
        <li>Assembly</li>
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
            <form role="form">
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
                  <label class="col-md-2"> Fitting </label>
                  <label> : </label>
                  <input type="text" id="fitting" name="fitting" value="{{$fitting->PERCENT}}">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-md-2"> Welding </label>
                  <label> : </label>
                  <input type="text" id="welding" name="welding" value="{{$welding->PERCENT}}">
                  <label> % </label>
                </div>    
                <div class="form-group">
                  <label class="col-md-2"> Grinding </label>
                  <label> : </label>
                  <input type="text" id="grinding" name="grinding" value="{{$grinding->PERCENT}}">
                  <label> % </label>
                </div>       
                <div class="form-group">
                  <label class="col-md-2"> Fairing </label>
                  <label> : </label>
                  <input type="text" id="fairing" name="fairing" value="{{$fairing->PERCENT}}">
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
                  <th>Name of Panel</th>
                  <th>Unfinished Fitting</th>
                  <th>Finished Fitting</th>
                  <th>Unfinished Welding</th>
                  <th>Finished Welding</th>
                  <th>Unfinished Grinding</th>
                  <th>Finished Grinding</th>
                  <th>Unfinished Fairing</th>
                  <th>Finished Fairing</th>
                  <th>Progress Activity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($progress as $prog)
                    @if($flagProject && $prog->ID_PROJECT==$_GET['project'])
                    <tr>
                      <td>{{$prog->ID}}</td>
                      <td>{{$prog->NUM-$prog->FIT}}</td>
                      <td>{{$prog->FIT}}</td>
                      <td>{{($prog->NUM-$prog->WELD)}}</td>
                      <td>{{$prog->WELD}}</td>
                      <td>{{($prog->NUM-$prog->GRIND)}}</td>
                      <td>{{$prog->GRIND}}</td>
                      <td>{{($prog->NUM-$prog->FAIR)}}</td>
                      <td>{{$prog->FAIR}}</td>
                      <td>{{($prog->FIT+$prog->WELD+$prog->GRIND+$prog->FAIR)/(4*$prog->NUM).'%'}}</td>
                    </tr>
                    @elseif(!$flagProject)
                    <tr>
                      <td>{{$prog->ID}}</td>
                      <td>{{$prog->NUM-$prog->FIT}}</td>
                      <td>{{$prog->FIT}}</td>
                      <td>{{($prog->NUM-$prog->WELD)}}</td>
                      <td>{{$prog->WELD}}</td>
                      <td>{{($prog->NUM-$prog->GRIND)}}</td>
                      <td>{{$prog->GRIND}}</td>
                      <td>{{($prog->NUM-$prog->FAIR)}}</td>
                      <td>{{$prog->FAIR}}</td>
                      <td>{{($prog->FIT+$prog->WELD+$prog->GRIND+$prog->FAIR)/(4*$prog->NUM).'%'}}</td>
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
