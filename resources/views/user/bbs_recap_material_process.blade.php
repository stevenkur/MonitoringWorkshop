@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Material Process
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Fabrication</li>
        <li class="active">Recap Material Process</li>
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
                if(isset($_GET['block']) && $_GET['block']!='#') 
                   $flagBlock=true;
                else $flagBlock=false;
            ?>

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Select BLock:</label>
                <div class="form-group">
                  <select class="form-control" name="block">
                    <option value="#">-- Block List --</option>
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

        <section class="col-md-12">
        <div class="box box-primary">

          <h3>Target Quantity per-Day: <br> [XX] m<sup>2</sup></h3>
          <br>  

        </div>
        </section>    

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Material List Plate</h3>
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area (m<sup>2</sup>)</th>
                  <th>Total Layer</th>
                  <th>Blasting</th>
                  <th>Blasting Date</th>
                  <th>Painting</th>
                  <th>Painting Date</th>
                  <th>Total Process</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  @foreach($room as $rooms)
                  <td>{{$rooms->ID}}</td>
                  <td>{{$rooms->SIDE}}</td>
                  <td>{{$rooms->FRAME}}</td>
                  <td>{{$rooms->DECK}}</td>
                  <td>{{$rooms->AREA}}</td>
                  <td>{{$rooms->TOTAL_LAYER}}</td>
                  <td>{{$rooms->BLASTING}}</td>
                  <td>{{$rooms->BLASTING_DATE}}</td>
                  <td>{{$rooms->PAINTING}}</td>
                  <td>{{$rooms->PAINTING_DATE}}</td>
                  <td>Process</td>
                  @endforeach
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
