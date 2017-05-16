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
        <li>SSH</li>
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

<!--
            <section class="col-lg-4">
            <div class="box box-primary">
            
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Activity:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- List --</option>
                    <option id="1">Straightening</option>
                    <option id="2">Blasting & Shop Primer</option>
                  </select>
                </div>
               
              </div>
            </form>
            </div>
            </section>
-->

        <section class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
              <h3>Target Quantity per-Day: <br> [XX] Plate per Workshop</h3>
              <br>  
            </div>
        </div>
        </section>

        <section class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
                <?php $countStr=0; $countBlast=0; $totalz=0; ?>
                @foreach($plate as $plates)
                    <?php
                        if($plates['STRAIGHTENING']==1) $countStr++;
                        if($plates['BLASTING']==1) $countBlast++;
                        $totalz++;
                    ?>
                @endforeach
                <h3>Finished Straightening: <?php echo $countStr; ?> plates
                    <br> Finished Blasting: <?php echo $countStr; ?> plates
                    <br> Total Plates: <?php echo $totalz; ?> plates
                </h3>
                <br>
            </div>
        </div>
        </section>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Material List Plate</h3>
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Straightening</th>
                  <th>Date Finished</th>
                  <th>Blasting & Shop Primer</th>
                  <th>Date Finished</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plate as $plates)
                    <?php
                    if($plates['STRAIGHTENING']==1) $str= 'finished '.$plates['STRAIGHTENING_DATE'];
                    else $str='unfinished';
                    if($plates['BLASTING']==1) $blast= 'finished '.$plates['BLASTING_DATE'];
                    else $blast='unfinished';
                    
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$str.'</td>
                        <td>'.$plates['STRAIGHTENING_DATE'].'</td>
                        <td>'.$blast.'</td>
                        <td>'.$plates['BLASTING_DATE'].'</td>
                    </tr>';?>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Straightening</th>
                  <th>Date Finished</th>
                  <th>Blasting & Shop Primer</th>
                  <th>Date Finished</th>
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
    $('#plate').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>