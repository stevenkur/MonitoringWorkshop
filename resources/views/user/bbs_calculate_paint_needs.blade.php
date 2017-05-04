@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calculation Paint Needs
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>BBS</li>
        <li class="active">Calculation Paint Needs</li>
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

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Select BLock:</label>
                <div class="form-group">
                  <select class="form-control" name="block">
                    <option id="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
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

        <div class="col-md-7">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="machine" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area(m<sup>2</sup>)</th>
                  <th>Total Layer</th>
                  <th>Paint Type</th>
                  <th>Paint Needs</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                <tr>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area(m2)</th>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <section class="col-lg-5">
        <div class="box box-primary">
        <form role="form" name="BBSPaint">
                <br>
                <div class="form-group">
                  <label class="col-lg-4"> Room: </label>
                  <input type="text" id="room" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-4"> Area: </label>
                  <input type="text" id="area" placeholder="">
                  <label> m2 </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-4"> Dry Film Thickness: </label>
                  <input type="text" id="dryfilm" placeholder="">
                  <label> mikron </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-4"> Volume Solid: </label>
                  <input type="text" id="volumesolid" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-4"> Loss Factor: </label>
                  <input type="text" id="lossfactor" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-4"> Total Layer: </label>
                  <input type="text" id="layer" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-4"> Paint Type: </label>
                  <input type="text" id="painttype" placeholder="">
                </div>

            <div class="box-footer" align="right">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Input</button>
            </div>
        </form>
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
