@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Erection Process
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">Erection Process</li>
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
                    <option value="1">Loading</option>
                    <option value="2">Adjusting</option>
                    <option value="3">Fitting</option>
                    <option value="4">Welding</option>
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
            
          <div class="box-body">
              <h1>Recap Process</h1>
              <table id="panel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Block 1</th>
                  <th>Block 2</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding Finish/Total (m)</th>
                  <th>Date of Start</th>
                  <th>Date of Finish</th>
                  <th>Total Progress</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Progress</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Progress</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Progress</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Block 1</th>
                  <th>Block 2</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding Finish/Total (m)</th>
                  <th>Date of Start</th>
                  <th>Date of Finish</th>
                  <th>Total Progress</th>
                </tr>
                </tfoot>
              </table>
             </div>
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
    $('#panel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
