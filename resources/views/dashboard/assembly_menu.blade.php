@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assembly
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">Assembly</li>
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
                $counts = count($progress);
            ?>
        
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Block's Assembly Process</h1>
              <table id="block" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Block</th>
                  <th>Assembly Progress</th>
                  <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=0;?>
                    @foreach($block as $index => $blocks)
                    <?php
                    if($i++<$counts) $progs = $progress[$index]['sum'];
                    else $progs = 0;
                    
                    if($flagProject && $blocks->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$progs.'% </td>';?>
                        <td>
                            <a href="../public/subassembly_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
                        </td>
                    <?php echo '</tr>';
                    }
                    else if(!$flagProject){
                    echo '
                    <tr>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$progs.'% </td>';?>
                        <td>
                            <a href="../public/subassembly_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
                        </td>
                    <?php echo '</tr>';
                    }?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Block</th>
                  <th>Assembly Progress</th>
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
              <h1>Panels</h1>  
              <table id="panel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Weight</th>
                  <th>Fitting</th>
                  <th>Fitting Machine</th>
                  <th>Welding</th>
                  <th>Welding Machine</th>
                  <th>Grinding</th>
                  <th>Grinding Machine</th>
                  <th>Fairing</th>
                  <th>Fairing Machine</th>
                </tr>
                </thead>
                <tbody>
                @foreach($panel as $panels)
                    <?php 
                    if($panels['FITTING']==1) $fitting= 'finished '.$panels['FITTING_DATE'];
                    else{
                        $fitting='unfinished';
                        $panels['FITTING_MACHINE'] = "-";
                    }
                    if($panels['WELDING']==1) $welding= 'finished '.$panels['WELDING_DATE'];
                    else{
                        $welding='unfinished';
                        $panels['WELDING_MACHINE'] = "-";
                    }
                    if($panels['GRINDING']==1) $grinding= 'finished '.$panels['GRINDING_DATE'];
                    else{
                        $grinding='unfinished';
                        $panels['GRINDING_MACHINE'] = "-";
                    }
                    if($panels['FAIRING']==1) $fairing= 'finished '.$panels['FAIRING_DATE'];
                    else{
                        $fairing='unfinished';
                        $panels['FAIRING_MACHINE'] = "-";
                    }
                    if($flagBlock && $panels->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td> 
                        <td>'.$panels['NAME'].'</td>
                        <td>'.$panels['PART'].'</td>
                        <td>'.$fitting.'</td>
                        <td>'.$panels['FITTING_MACHINE'].'</td>
                        <td>'.$welding.'</td>
                        <td>'.$panels['WELDING_MACHINE'].'</td>
                        <td>'.$grinding.'</td>
                        <td>'.$panels['GRINDING_MACHINE'].'</td>
                        <td>'.$fairing.'</td>
                        <td>'.$panels['FAIRING_MACHINE'].'</td>
                    </tr>';
                    }
                    else if($flagProject && $panels->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td> 
                        <td>'.$panels['NAME'].'</td>
                        <td>'.$panels['PART'].'</td>
                        <td>'.$fitting.'</td>
                        <td>'.$panels['FITTING_MACHINE'].'</td>
                        <td>'.$welding.'</td>
                        <td>'.$panels['WELDING_MACHINE'].'</td>
                        <td>'.$grinding.'</td>
                        <td>'.$panels['GRINDING_MACHINE'].'</td>
                        <td>'.$fairing.'</td>
                        <td>'.$panels['FAIRING_MACHINE'].'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td> 
                        <td>'.$panels['NAME'].'</td>
                        <td>'.$panels['PART'].'</td>
                        <td>'.$fitting.'</td>
                        <td>'.$panels['FITTING_MACHINE'].'</td>
                        <td>'.$welding.'</td>
                        <td>'.$panels['WELDING_MACHINE'].'</td>
                        <td>'.$grinding.'</td>
                        <td>'.$panels['GRINDING_MACHINE'].'</td>
                        <td>'.$fairing.'</td>
                        <td>'.$panels['FAIRING_MACHINE'].'</td>
                    </tr>';
                        }?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Weight</th>
                  <th>Fitting</th>
                  <th>Fitting Machine</th>
                  <th>Welding</th>
                  <th>Welding Machine</th>
                  <th>Grinding</th>
                  <th>Grinding Machine</th>
                  <th>Fairing</th>
                  <th>Fairing Machine</th>
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
    $('#block').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
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