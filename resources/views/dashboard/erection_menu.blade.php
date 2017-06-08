@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Erection Process
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">Erection Process</li>
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
                  <select class="form-control">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $datas[$i] = $data; $i++;?>
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

        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Process</h1>
              <table id="panel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Block 1</th>
                  <th>Block 2</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding Finish/Total (m)</th>
                  <th>Date of Start</th>
                  <th>Date of Finish</th>
                  <th>Total Progress</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Progress</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Progress</td>
                </tr>
                <tr>
                  <td>Block 1</td>
                  <td>Block 2</td>
                  <td>Loading</td>
                  <td>Adjusting</td>
                  <td>Fitting</td>
                  <td>Welding Finish/Total (m)</td>
                  <td>Date of Start</td>
                  <td>Date of Finish</td>
                  <td>Total Progress</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Block 1</th>
                  <th>Block 2</th>
                  <th>Loading</th>
                  <th>Adjusting</th>
                  <th>Fitting</th>
                  <th>Welding Finish/Total (m)</th>
                  <th>Date of Start</th>
                  <th>Date of Finish</th>
                  <th>Total Progress</th>
                </tr>
                </tfoot>
              </table>
          </div>

        </div>
        </div>

        @elseif($_GET['activity']==0) 
        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Recap Progress Block Activity</h1>
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
                  <td>{{$prog->NAME}}</td>
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
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name of Worker</th>
                    <th>NIK</th>
                    <th>Shift</th>
                    <th>Activity</th>
                    <th>Problem</th>
                    <th>Many hours Realitation</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($erection as $erections)
                <tr>
                  <td>{{$erections->WORKER_NAME}}</td>
                  <td>{{$erections->ID_WORKER}}</td>
                  <td>{{$erections->SHIFT}}</td>
                  <td>{{$erections->PROCESS.' '.$erections->ID_MATERIAL}}</td>
                  <td>{{$erections->PROBLEM}}</td>
                  <td>{{$erections->WORKING_HOURS+$erections->ADD_WORKING_HOURS}}</td>
                  <td>{{$erections->created_at}}</td>
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
    $('#panel').DataTable({
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
    $('#workshopproductivity').DataTable({
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
