@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BBS
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">BBS</li>
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
              <label for="inputActivity">Select Activity:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option value="#">--Select Activity--</option>
                    <option value="1">Blasting</option>
                    <option value="2">Painting</option>
                    <option value="3">Recap Paint Needs</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
          </div>

          </div>

        <div class="col-md-12">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $datas[$i] = $data; $i++;?>
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
          </div>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Recap Process</h3>
              <table id="bbs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area (m<sup>2</sup>)</th>
                  <th>Blasting</th>
                  <th>FInished Layer Painting</th>
                  <th>Date of Work</th>
                  <th>Total Process</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area (m2)</td>
                  <td>Blasting</td>
                  <td>FInished Layer Painting</td>
                  <td>Date of Work</td>
                  <td>Total Process</td>
                </tr>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area (m2)</td>
                  <td>Blasting</td>
                  <td>FInished Layer Painting</td>
                  <td>Date of Work</td>
                  <td>Total Process</td>
                </tr>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area (m2)</td>
                  <td>Blasting</td>
                  <td>FInished Layer Painting</td>
                  <td>Date of Work</td>
                  <td>Total Process</td>
                </tr>
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
    $('#bbs').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
