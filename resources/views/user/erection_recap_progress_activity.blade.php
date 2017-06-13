@extends('layouts.backend-usererection')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Join Block
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Erection</li>
        <li class="active">Recap Progress Activity</li>
      </ol>
    </section>

    <!-- Main content -->
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
                  <select class="form-control" name="project">
                    <option id="#">-- Ship Project List --</option>
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
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="machine" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Block</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding</th>
                  <th>Total Progress</th>
                </tr>
                </thead>
                <tbody>
                @foreach($block as $blocks)
                  @if($flagProject && $blocks->ID_PROJECT == $_GET['project'])
                  <tr>
                    <td>{{$blocks->NAME}}</td>
                    <td>{{$blocks->LOADING}}</td>
                    <td>{{$blocks->ADJUSTING}}</td>
                    <td>{{$blocks->FITTING}}</td>
                    <td>{{$blocks->WELDING}}</td>
                    <td>{{(($blocks->LOADING*$loading->PERCENT)+($blocks->ADJUSTING*$adjusting->PERCENT)+($blocks->FITTING*$fitting->PERCENT)+($blocks->WELDING*$welding->PERCENT)).'%'}}</td>
                  </tr>
                  @elseif(!$flagProject)
                  <tr>
                    <td>{{$blocks->NAME}}</td>
                    <td>{{$blocks->LOADING}}</td>
                    <td>{{$blocks->ADJUSTING}}</td>
                    <td>{{$blocks->FITTING}}</td>
                    <td>{{$blocks->WELDING}}</td>
                    <td>{{(($blocks->LOADING*$loading->PERCENT)+($blocks->ADJUSTING*$adjusting->PERCENT)+($blocks->FITTING*$fitting->PERCENT)+($blocks->WELDING*$welding->PERCENT)).'%'}}</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Block</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding</th>
                  <th>Total Progress</th>
                </tr>
                </tfoot>
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
    $('#machine').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
