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
                $counts = count($progress);
            ?>
        
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Block's Assembly Process</h1>
              <div class="table-responsive" style="overflow: auto">
              <table id="block" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Block</th>
                  <th>Assembly Progress</th>
                  <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($progr as $progs) 
                    @php $ids=$progs->ID_BLOCK; @endphp
                    @if($flagProject && $progs->ID_PROJECT == $_GET['project']){
                    <tr>
                        <td>{{$progs->BLOCK_NAME}}</td>
                        <td>{{$progs->PROGRESS.'%'}} </td>
                        <td>
                            <a href="./assembly_menu?block=<?php echo $ids;?> " class="btn btn-primary">View Detail</a>
                        </td>
                    </tr>
                    @elseif(!$flagProject)
                    <tr>
                        <td>{{$progs->BLOCK_NAME}}</td>
                        <td>{{$progs->PROGRESS.'%'}} </td>
                        <td>
                            <a href="./assembly_menu?block=<?php echo $ids;?> " class="btn btn-primary">View Detail</a>
                        </td>
                    </tr>
                    @endif
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
          </div>

          <div class="col-md-12">
            <div class="box box-primary">
  
              <div class="box-body">
              <h1>Panels</h1>  
              <div class="table-responsive" style="overflow: auto">
              <table id="panel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Weight</th>
                  <th>Fitting</th>
                  <th>Fitting Machine</th>
                  <th>Photo</th>
                  <th>Welding</th>
                  <th>Welding Machine</th>
                  <th>Photo</th>
                  <th>Grinding</th>
                  <th>Grinding Machine</th>
                  <th>Photo</th>
                  <th>Fairing</th>
                  <th>Fairing Machine</th>
                  <th>Photo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($panel as $panels)
                    <?php 
                    if($panels['FITTING']==1) $fitting= 'finished '.$panels['FITTING_DATE'];
                    else{
                        $fitting=$panels['FITTING'];
                        $panels['FITTING_MACHINE'] = "-";
                        $panels['FITTING_PHOTO'] = "-";
                    }
                    if($panels['WELDING']==1) $welding= 'finished '.$panels['WELDING_DATE'];
                    else{
                        $welding=$panels['WELDING'];
                        $panels['WELDING_MACHINE'] = "-";
                        $panels['WELDING_PHOTO'] = "-";
                    }
                    if($panels['GRINDING']==1) $grinding= 'finished '.$panels['GRINDING_DATE'];
                    else{
                        $grinding=$panels['GRINDING'];
                        $panels['GRINDING_MACHINE'] = "-";
                        $panels['GRINDING_PHOTO'] = "-";
                    }
                    if($panels['FAIRING']==1) $fairing= 'finished '.$panels['FAIRING_DATE'];
                    else{
                        $fairing=$panels['FAIRING'];
                        $panels['FAIRING_MACHINE'] = "-";
                        $panels['FAIRING_PHOTO'] = "-";
                    }
                    if($flagBlock && $panels->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td> 
                        <td>'.$panels['NAME'].'</td>
                        <td>'.$panels['PART'].'</td>
                        <td>'.$fitting.'</td>
                        <td>'.$panels['FITTING_MACHINE'].'</td>
                        <td>'.$panels['FITTING_PHOTO'].'</td>
                        <td>'.$welding.'</td>
                        <td>'.$panels['WELDING_MACHINE'].'</td>
                        <td>'.$panels['WELDING_PHOTO'].'</td>
                        <td>'.$grinding.'</td>
                        <td>'.$panels['GRINDING_MACHINE'].'</td>
                        <td>'.$panels['GRINDING_PHOTO'].'</td>
                        <td>'.$fairing.'</td>
                        <td>'.$panels['FAIRING_MACHINE'].'</td>
                        <td>'.$panels['FAIRING_PHOTO'].'</td>
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
                        <td>'.$panels['FITTING_PHOTO'].'</td>
                        <td>'.$welding.'</td>
                        <td>'.$panels['WELDING_MACHINE'].'</td>
                        <td>'.$panels['WELDING_PHOTO'].'</td>
                        <td>'.$grinding.'</td>
                        <td>'.$panels['GRINDING_MACHINE'].'</td>
                        <td>'.$panels['GRINDING_PHOTO'].'</td>
                        <td>'.$fairing.'</td>
                        <td>'.$panels['FAIRING_MACHINE'].'</td>
                        <td>'.$panels['FAIRING_PHOTO'].'</td>
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
                        <td>'.$panels['FITTING_PHOTO'].'</td>
                        <td>'.$welding.'</td>
                        <td>'.$panels['WELDING_MACHINE'].'</td>
                        <td>'.$panels['WELDING_PHOTO'].'</td>
                        <td>'.$grinding.'</td>
                        <td>'.$panels['GRINDING_MACHINE'].'</td>
                        <td>'.$panels['GRINDING_PHOTO'].'</td>
                        <td>'.$fairing.'</td>
                        <td>'.$panels['FAIRING_MACHINE'].'</td>
                        <td>'.$panels['FAIRING_PHOTO'].'</td>
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

          @elseif($_GET['activity']==0) 
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Progress Block Activity</h1>
              <div class="table-responsive" style="overflow: auto">
              <table id="panel" class="table table-bordered table-striped">
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
                  <td>16.98 JO/ton</td>
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
                @foreach($ass as $asss)
                    <?php   if ($asss->OPERATOR=="ok") $ops=true;
                                else $ops=false;?>
                <tr>
                    <td>{{$asss->WORKER_NAME}}</td>
                    <td>{{$asss->SHIFT}}</td>
                    @if($ops)
                    <td>{{$asss->PROCESS.' '.$asss->ID_PART.' - operator'}}</td>
                    @else
                    <td>{{$asss->PROCESS.' '.$asss->ID_PART}}</td>
                    @endif
                    <td>{{$asss->PROBLEM}}</td>
                    <td>{{$asss->MACHINE_WORKING+$asss->MACHINE_ADD_HOURS.' hours'}}</td>
                    <td>{{$asss->WASTE_TIME.' hours'}}</td>
                    <td>{{$asss->created_at}}</td>
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