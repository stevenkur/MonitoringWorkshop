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
            <form class="form">
              <div class="box-body">
              <label for="inputActivity">Select Activity:</label>
                <div class="form-group">
                  <select class="form-control" name="activity">
                    <option value="#">--Select Activity--</option>
                    <option value="0">Recap Progress Block Activity</option>
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
            ?>
          
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Block's Fabrication Process</h1>
              <div class="table-responsive" style="overflow: auto">
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
                            <a href="./fabrication_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
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
                            <a href="./fabrication_menu?block=<?php echo $blocks['ID'];?> " class="btn btn-primary">View Detail</a>
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
          </div>
 
          <div class="col-md-12">
          <div class="box box-primary">
  
              <div class="box-body">
              <h1>Plate</h1>
              <div class="table-responsive" style="overflow: auto">  
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Marking</th>
                  <th>Marking Machine</th>
                  <th>Photo</th>
                  <th>Cutting</th>
                  <th>Cutting Machine</th>
                  <th>Photo</th>
                  <th>Bending</th>
                  <th>Bending Machine</th>
                  <th>Photo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plate as $plates)
                    <?php 
                    if($plates['MARKING']==1) $marking= 'finished '.$plates['MARKING_DATE'];
                    else{
                        $marking='unfinished';
                        $plates['MARKING_MACHINE'] = "-";
                        $plates['MARKING_PHOTO'] = "-";
                    }
                    if($plates['CUTTING']==1) $cut= 'finished '.$plates['CUTTING_DATE'];
                    else{
                        $cut='unfinished';
                        $plates['CUTTING_MACHINE'] = "-";
                        $plates['CUTTING_PHOTO'] = "-";
                    }
                    if($plates['BENDING']==1) $blend= 'finished '.$plates['BENDING_DATE'];
                    else{
                        $blend='unfinished';
                        $plates['BENDING_MACHINE'] = "-";
                        $plates['BENDING_PHOTO'] = "-";
                    }
                    if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            
                        <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$marking.'</td>
                        <td>'.$plates['MARKING_MACHINE'].'</td>
                        <td>'.$plates['MARKING_PHOTO'].'</td>
                        <td>'.$cut.'</td>
                        <td>'.$plates['CUTTING_MACHINE'].'</td>
                        <td>'.$plates['CUTTING_PHOTO'].'</td>
                        <td>'.$blend.'</td>
                        <td>'.$plates['BENDING_MACHINE'].'</td>
                        <td>'.$plates['BENDING_PHOTO'].'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            
                        <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$marking.'</td>
                        <td>'.$plates['MARKING_MACHINE'].'</td>
                        <td>'.$plates['MARKING_PHOTO'].'</td>
                        <td>'.$cut.'</td>
                        <td>'.$plates['CUTTING_MACHINE'].'</td>
                        <td>'.$plates['CUTTING_PHOTO'].'</td>
                        <td>'.$blend.'</td>
                        <td>'.$plates['BENDING_MACHINE'].'</td>
                        <td>'.$plates['BENDING_PHOTO'].'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            
                        <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$marking.'</td>
                        <td>'.$plates['MARKING_MACHINE'].'</td>
                        <td>'.$plates['MARKING_PHOTO'].'</td>
                        <td>'.$cut.'</td>
                        <td>'.$plates['CUTTING_MACHINE'].'</td>
                        <td>'.$plates['CUTTING_PHOTO'].'</td>
                        <td>'.$blend.'</td>
                        <td>'.$plates['BENDING_MACHINE'].'</td>
                        <td>'.$plates['BENDING_PHOTO'].'</td>
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
                  <th>Photo</th>
                  <th>Cutting</th>
                  <th>Cutting Machine</th>
                  <th>Photo</th>
                  <th>Bending</th>
                  <th>Bending Machine</th>
                  <th>Photo</th>
                </tr>
                </tfoot>
              </table>
              </div>
             </div>  
              
           </div>
          </div>
          
          @elseif($_GET['activity']==0) 
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Progress Block Activity</h1>
              <div class="table-responsive" style="overflow: auto">
              <table id="progress" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Block Name</th>
                  <th>Total Progress</th>
                </tr>
                </thead>
                <tbody>
                @foreach($progr as $prog)
                <tr>
                  <td>{{$prog->BLOCK_NAME}}</td>
                  <td>{{$prog->PROGRESS.'%'}}</td>
                </tr>  
                @endforeach          
                </tbody>
                <tfoot>
                <tr>
                  <th>Block Name</th>
                  <th>Total Progress</th>
                </tr>
                </tfoot>
              </table>
              </div>
          </div>
          
        </div>
        </div>

          @elseif($_GET['activity']==3)  
            <!-- <div class="col-md-3">
            <div class="box box-primary">
                
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

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Choose</button>
                  </div>
                </form>
            
            </div>
            </div> -->


            <?php 
                if(isset($_GET['MonthOutputWorkshop'])!='#') 
                   $flagMonthWorkshop=true;
                else $flagMonthWorkshop=false;
            ?>

            <div class="col-md-12">
            <div class="box box-primary">
  
              <div class="box-body">
              <h1>Workshop Productivity</h1>  
              <div class="table-responsive" style="overflow: auto">
              <table id="workshopproductivity" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Output/Day (ton)</th>
                  <th>Target Output/Day (ton)</th>
                  <th>Productivity (JO/ton)</th>
                  <th>Productivity Target (JO/ton)</th>
                  <th>Problem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productivity as $prod)
                <tr>
                  <td>{{ $prod->DATE }}</td>
                  <td>{{ $prod->WEIGHT/1000 }}</td>
                  <td>{{ $target[0]->TARGET/1000 }}</td>
                  <td>{{ $prod->PRODUCTIVITY }}</td>
                  <td>4.2 JO/ton</td>
                  <td>{{ $prod->PROBLEM }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Output/Day (ton)</th>
                  <th>Target Output/Day (ton)</th>
                  <th>Productivity</th>
                  <th>Productivity Target</th>
                  <th>Problem</th>
                </tr>
                </tfoot>
              </table>
              </div>
             </div>  
              
            </div>
            </div>

            @elseif($_GET['activity']==4)  
            <!-- <div class="col-md-3">
            <div class="box box-primary">
                
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

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Choose</button>
                  </div>
                </form>
            
            </div>
            </div> -->


            <?php 
                if(isset($_GET['MonthOutputMachine'])!='#') 
                   $flagMonthMachine=true;
                else $flagMonthMachine=false;
            ?>

            <div class="col-md-9">
            <div class="box box-primary">
  
              <div class="box-body">
              <h1>Working Machine Productivity</h1>  
              <div class="table-responsive" style="overflow: auto">
              <table id="machineproductivity" class="table table-bordered table-striped">
                <thead>
                <tr>     
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Capacity Max</th>
                  <th>Normal/Realization Hours</th>
                  <th>Waste Time</th>
                  <th>Output (ton)</th>
                </tr>
                </thead>
                <tbody>      
                @foreach($machineproductivity as $machprod)
                <tr> 
                  <td>{{ $machprod->DATE }}</td>
                  <td>{{ $machprod->MACHINE }}</td>
                  <td>{{ $machprod->CAPACITY*60*$machprod->NORMAL}}</td>
                  <td>{{ $machprod->NORMAL.'/'.$machprod->REALIZATION }}</td>
                  <td>{{ $machprod->WASTE_TIME }}</td>
                  <td>{{ $machprod->OUTPUT }}</td>
                </tr>
                @endforeach                           
                </tbody>
                <tfoot>
                <tr>        
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Capacity Max</th>
                  <th>Normal/Realization Hours</th>
                  <th>Waste Time</th>
                  <th>Output (ton)</th>
                </tr>
                </tfoot>
              </table>
              </div>
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
            <!-- /.box-header -->
            <div class="box-body">
            <h3>List Worker</h3>
              <div class="table-responsive" style="overflow: auto">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name of Worker</th>
                    <th>Shift</th>
                    <th>Activity</th>
                    <th>Problem</th>
                    <th>Realitation Hours</th>
                    <th>Waste Time</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fabrication as $fabrications)
                    <?php   if ($fabrications->OPERATOR=="ok") $ops=true;
                                else $ops=false;?>
                <tr>
                    <td>{{$fabrications->WORKER_NAME}}</td>
                    <td>{{$fabrications->SHIFT}}</td>
                    @if($ops)
                    <td>{{$fabrications->PROCESS.' '.$fabrications->ID_MATERIAL.' - operator'}}</td>
                    @else
                    <td>{{$fabrications->PROCESS.' '.$fabrications->ID_MATERIAL}}</td>
                    @endif<td>{{$fabrications->PROBLEM}}</td>
                    <td>{{$fabrications->MACHINE_WORKING+$fabrications->MACHINE_ADD_HOURS.' hours'}}</td>
                    <td>{{$fabrications->WASTE_TIME.' hours'}}</td>
                    <td>{{$fabrications->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
              </div>
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
    $('#progress').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#plate').DataTable({
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
