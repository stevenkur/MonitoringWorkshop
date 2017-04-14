@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Material Coming
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>SSH</li>
        <li class="active">Input Material Coming</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipProject">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
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

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Select BLock:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME}}</option>
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

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Plate</h3>
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Checklist</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistplate" placeholder=""></td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistplate" placeholder=""></td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistplate" placeholder=""></td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistplate" placeholder=""></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Profile</h3>
              <table id="profile" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Length</th>
                  <th>Weight</th>
                  <th>Checklist</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Length</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistprofile" placeholder=""></td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Length</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistprofile" placeholder=""></td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Length</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistprofile" placeholder=""></td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Length</td>
                  <td>Weight</td>
                  <td><input type="checkbox" id="checklistprofile" placeholder=""></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="box-footer" align="right">
          <label style="font-size: 16px">Date of Coming: </label>
          <input type="date" id="dateofcoming" placeholder="">
          <button type="submit" class="btn btn-primary">Input</button>
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
    $('#plate').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true
    });
    $('#profile').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true
    });
  });
</script>
