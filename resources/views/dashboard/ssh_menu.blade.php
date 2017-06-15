@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SSH
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">SSH</li>
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
                    <option value="1">Recap Material Coming</option>
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

        @if(isset($_GET['activity']) || isset($_GET['project_come']) || isset($_GET['block_come']))
        @if(isset($_GET['project_come']) || isset($_GET['block_come']) || $_GET['activity']==1 )
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Detail Material Coming</h1>
              <div class="table-responsive" style="overflow: auto">
              <table id="material" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Ship</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress</th>
                  <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ship as $ships)
                    <?php 
                    if($ships['MATERIAL']==0)
                        $progress = 0;
                    else
                        $progress = 100*$ships['MATERIAL_COMING']/$ships['MATERIAL'];?>
                    <tr>
                        <td>{{$ships->PROJECT_NAME}}</td>
                        <td>{{$ships->MATERIAL}}</td>
                        <td>{{$ships->MATERIAL_COMING}}</td>
                        <td>{{$progress.'%'}}</td>
                        <td>
                            <a href="./ssh_menu?project_come=<?php echo $ships['ID'];?>" class="btn btn-primary">View Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Ship</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress</th>
                  <th>View Detail</th>
                </tr>
                </tfoot>
              </table>
              </div>
             </div>
           </div>
        </div>

          <?php 
                if(isset($_GET['project_come']) && $_GET['project_come']!='#') 
                   $flagProject=true;
                else $flagProject=false;
                if(isset($_GET['block_come']) && $_GET['block_come']!='#') 
                   $flagBlock=true;
                else $flagBlock=false;
            ?>

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
                  <th>Date of Coming</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plate as $plates)
                    <?php 
                    if($plates['DATE_COMING']==null) $status = 'pending';
                    else $status = 'Received '.$plates['DATE_COMING'];
                    if($flagBlock && $plates->ID_BLOCK == $_GET['block_come']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project_come']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                        <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>'.$status.'</td>
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
                  <th>Date of Coming</th>
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
              <h1>Profil</h1>
              <div class="table-responsive" style="overflow: auto">
              <table id="profil" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID Material</th>
                    <th>Dimension</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Form</th>
                    <th>Date of Coming</th>
                </tr>
                </thead>
                <tbody>
                @foreach($profile as $profiles)
                    <?php 
                    if($profiles['DATE_COMING']==null) $status = 'pending';
                    else $status = 'Received '.$profiles['DATE_COMING'];
                    if($flagBlock && $plates->ID_BLOCK == $_GET['block_come']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>                            <td>'.$profiles['LENGTH'].','.$profiles['BREADTH'].','.$profiles['THICKNESS'].'</td>
                        <td>'.$profiles['PORT'].','.$profiles['CENTER'].','.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project_come']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>                            <td>'.$profiles['LENGTH'].','.$profiles['BREADTH'].','.$profiles['THICKNESS'].'</td>
                        <td>'.$profiles['PORT'].','.$profiles['CENTER'].','.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>                            <td>'.$profiles['LENGTH'].','.$profiles['BREADTH'].','.$profiles['THICKNESS'].'</td>
                        <td>'.$profiles['PORT'].','.$profiles['CENTER'].','.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                        <td>'.$status.'</td>
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
                  <th>Date of Coming</th>
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

          @elseif($_GET['activity']==2)  
            <div class="col-md-12">
            <div class="box box-primary">
  
              <div class="box-body">
              <h1>Plate</h1>  
              <div class="table-responsive" style="overflow: auto">
              <table id="plate_process" class="table table-bordered table-striped">
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
              <div class="table-responsive" style="overflow: auto">
              <table id="workshopproductivity" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Output/Day (Ton/JO)</th>
                  <th>Target Output/Day (Ton/JO)</th>
                  <th>Productivity</th>
                  <th>Productivity Target</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Output/Day (Ton/JO)</th>
                  <th>Target Output/Day (Ton/JO)</th>
                  <th>Productivity</th>
                  <th>Productivity Target</th>
                </tr>
                </tfoot>
              </table>
              </div>
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
              <div class="table-responsive" style="overflow: auto">
              <table id="machineproductivity" class="table table-bordered table-striped">
                <thead>
                <tr>                 
                  <th>Date</th>
                  <th>Straightening Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Blasting & Shop Primer Machine</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>                 
                  <th>Date</th>
                  <th>Straightening Machine</th>
                  <th>Normal/Realization Hours</th>
                  <th>Blasting & Shop Primer Machine</th>
                  <th>Normal/Realization Hours</th>
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
                        <th>NIK</th>
                        <th>Shift</th>
                        <th>Activity</th>
                        <th>Problem</th>
                        <th>Many Hours Realitation</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ssh as $sshs)
                    <tr>
                      <td>{{$sshs->WORKER_NAME}}</td>
                      <td>{{$sshs->ID_WORKER}}</td>
                      <td>{{$sshs->SHIFT}}</td>
                      <td>{{$sshs->PROCESS.' '.$sshs->ID_MATERIAL}}</td>
                      <td>{{$sshs->PROBLEM}}</td>
                      <td>{{$sshs->MACHINE_WORKING+$sshs->MACHINE_ADD_HOURS}}</td>
                      <td>{{$sshs->created_at}}</td>
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
    $('#material').DataTable({
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
    $('#profil').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#plate_process').DataTable({
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
