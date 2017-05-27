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
            <form class="form">
              <div class="box-body">
              <label for="inputActivity">Select Activity:</label>
                <div class="form-group">
                  <select class="form-control" name="activity">
                    <option value="#">--Select Activity--</option>
                    <option value="2">Recap Activities</option>
                    <option value="3">Workshop Productivity</option>
                    <option value="4">Working Machine Productivity</option>
                    <option value="5">View Workers</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button method="post" class="btn btn-primary">Choose</button>
              </div>
            </form>
          </div>
          </div>

        @if(isset($_GET['activity']) || isset($_GET['project']) || isset($_GET['block']))
        @if(isset($_GET['project']) || isset($_GET['block']) || $_GET['activity']==2 )
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
                            <a href="./assembly_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
                        </td>
                    <?php echo '</tr>';
                    }
                    else if(!$flagProject){
                    echo '
                    <tr>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$progs.'% </td>';?>
                        <td>
                            <a href="./assembly_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
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
                        $fitting=$panels['FITTING'];
                        $panels['FITTING_MACHINE'] = "-";
                    }
                    if($panels['WELDING']==1) $welding= 'finished '.$panels['WELDING_DATE'];
                    else{
                        $welding=$panels['WELDING'];
                        $panels['WELDING_MACHINE'] = "-";
                    }
                    if($panels['GRINDING']==1) $grinding= 'finished '.$panels['GRINDING_DATE'];
                    else{
                        $grinding=$panels['GRINDING'];
                        $panels['GRINDING_MACHINE'] = "-";
                    }
                    if($panels['FAIRING']==1) $fairing= 'finished '.$panels['FAIRING_DATE'];
                    else{
                        $fairing=$panels['FAIRING'];
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

          @elseif($_GET['activity']==3)  
            <div class="col-md-3">
            <div class="box box-primary">
                
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                  <label for="MonthOutputWorkshop">View Month Output:</label>
                    <div class="form-group">
                      <select class="form-control" name="MonthOutputWorkshop">
                        <option value="#">-- Month List --</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>                        
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
                if(isset($_GET['MonthOutputWorkshop'])!='#') 
                   $flagMonthWorkshop=true;
                else $flagMonthWorkshop=false;
            ?>

            <div class="col-md-9">
            <div class="box box-primary">
  
              <div class="box-body">
              <h1>Workshop Productivity</h1>  
              <table id="workshopproductivity" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Output/Day (Ton/Sheet)</th>
                  <th>Target Output/Day (Ton/Sheet)</th>
                  <th>Productivity</th>
                  <th>Productivity Target</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Output/Day (Ton/Sheet)</th>
                  <th>Target Output/Day (Ton/Sheet)</th>
                  <th>Productivity</th>
                  <th>Productivity Target</th>
                </tr>
                </tfoot>
              </table>
             </div>  
              
            </div>
            </div>

            @elseif($_GET['activity']==4)  
            <div class="col-md-3">
            <div class="box box-primary">
                
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                  <label for="MonthOutputMachine">View Month Output:</label>
                    <div class="form-group">
                      <select class="form-control" name="MonthOutputMachine">
                        <option value="#">-- Month List --</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>                        
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
                if(isset($_GET['MonthOutputMachine'])!='#') 
                   $flagMonthMachine=true;
                else $flagMonthMachine=false;
            ?>

            <div class="col-md-9">
            <div class="box box-primary">
  
              <div class="box-body">
              <h1>Working Machine Productivity</h1>  
              <table id="machineproductivity" class="table table-bordered table-striped">
                <thead>
                <tr>                 
                  <th>Date</th>
                  <th>Fitting Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Welding Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Grinding Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Fairing Machine</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>                 
                  <th>Date</th>
                  <th>Fitting Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Welding Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Grinding Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Fairing Machine</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </tfoot>
              </table>
             </div>  
              
            </div>
            </div>

            @elseif($_GET['activity']==5)
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
        
        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>List Worker</h3>
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name of Worker</th>
                    <th>NIK</th>
                    <th>Shift</th>
                    <th>Activity</th>
                    <th>Problem</th>
                    <th>Many Hours Realitation</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ass as $asss)
                <tr>
                  <td>{{$asss->WORKER_NAME}}</td>
                  <td>{{$asss->ID_WORKER}}</td>
                  <td>{{$asss->SHIFT}}</td>
                  <td>{{$asss->PROCESS.' '.$asss->ID_PART}}</td>
                  <td>{{$asss->PROBLEM}}</td>
                  <td>{{$asss->MACHINE_WORKING+$asss->MACHINE_ADD_HOURS}}</td>
                  <td>{{$asss->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

          @endif
        @endif

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
    $('#workshopproductivity').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#machineproductivity').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
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