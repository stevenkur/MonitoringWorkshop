@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabrication
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">Fabrication</li>
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
          </div>

          <?php 
                if(isset($_GET['project']) && $_GET['project']!='#') 
                   $flagProject=true;
                else $flagProject=false;
                if(isset($_GET['block']) && $_GET['block']!='#') 
                   $flagBlock=true;
                else $flagBlock=false;
            ?>
          
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Material Process</h1>
              <table id="block" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Block</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress per Block</th>
                  <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($block as $blocks)
                    <?php 
                    if($blocks['MATERIAL']==0)
                        $progress = 0;
                    else
                        $progress = 100*$blocks['MATERIAL_COMING']/$blocks['MATERIAL'];
                    if($flagProject && $blocks->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$blocks['MATERIAL'].'</td>
                        <td>'.$blocks['MATERIAL_COMING'].'</td>
                        <td>'.$progress.'% </td>';?>
                        <td>
                            <a href="../public/fabrication_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
                        </td>
                    <?php echo '</tr>';
                    }
                    else if(!$flagProject){
                    echo '
                    <tr>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$blocks['MATERIAL'].'</td>
                        <td>'.$blocks['MATERIAL_COMING'].'</td>
                        <td>'.$progress.'% </td>';?>
                        <td>
                            <a href="../public/fabrication_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
                        </td>
                    <?php echo '</tr>';
                    }?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Block</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress per Block</th>
                  <th>View Detail</th>
                </tr>
                </tfoot>
              </table>
             </div>
           </div>
        </div>

          <div class="col-md-12">
          <div class="box box-primary">
  
              <div class="box-body">
              <h1>Plate</h1>  
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Marking</th>
                  <th>Marking Machine</th>
                  <th>Cutting</th>
                  <th>Cutting Machine</th>
                  <th>Blending</th>
                  <th>Blending Machine</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plate as $plates)
                    <?php 
                    if($plates['MARKING']==1) $marking= 'finished '.$plates['MARKING_DATE'];
                    else{
                        $marking='unfinished';
                        $plates['MARKING_MACHINE'] = "-";
                    }
                    if($plates['CUTTING']==1) $cut= 'finished '.$plates['CUTTING_DATE'];
                    else{
                        $cut='unfinished';
                        $plates['CUTTING_MACHINE'] = "-";
                    }
                    if($plates['BLENDING']==1) $blend= 'finished '.$plates['BLENDING_DATE'];
                    else{
                        $blend='unfinished';
                        $plates['BLENDING_MACHINE'] = "-";
                    }
                    if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$marking.'</td>
                        <td>'.$plates['MARKING_MACHINE'].'</td>
                        <td>'.$cut.'</td>
                        <td>'.$plates['CUTTING_MACHINE'].'</td>
                        <td>'.$blend.'</td>
                        <td>'.$plates['BLENDING_MACHINE'].'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$marking.'</td>
                        <td>'.$plates['MARKING_MACHINE'].'</td>
                        <td>'.$cut.'</td>
                        <td>'.$plates['CUTTING_MACHINE'].'</td>
                        <td>'.$blend.'</td>
                        <td>'.$plates['BLENDING_MACHINE'].'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$marking.'</td>
                        <td>'.$plates['MARKING_MACHINE'].'</td>
                        <td>'.$cut.'</td>
                        <td>'.$plates['CUTTING_MACHINE'].'</td>
                        <td>'.$blend.'</td>
                        <td>'.$plates['BLENDING_MACHINE'].'</td>
                    </tr>';
                        }?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Marking</th>
                  <th>Marking Machine</th>
                  <th>Cutting</th>
                  <th>Cutting Machine</th>
                  <th>Blending</th>
                  <th>Blending Machine</th>
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
    $('#block').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
