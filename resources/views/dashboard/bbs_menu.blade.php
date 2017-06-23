@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BBS
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">BBS</li>
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
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Recap Process</h3>
              <div class="table-responsive" style="overflow: auto">
              <table id="bbs" class="table table-bordered table-striped">
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
                </tr>
                </thead>
                <tbody>
                @foreach($room as $rooms)
                <tr>
                  <td>{{$rooms->ID}}</td>
                  <td>{{$rooms->SIDE}}</td>
                  <td>{{$rooms->FRAME}}</td>
                  <td>{{$rooms->DECK}}</td>
                  <td>{{$rooms->AREA}}</td>
                  <td>{{$rooms->TOTAL_LAYER}}</td>
                  <td>{{$rooms->BLASTING}}</td>
                  <td>
                    @if(empty($rooms->BLASTING_DATE))
                    -----
                    @else
                    {{$rooms->BLASTING_DATE}}
                    @endif
                  </td>
                  <td>{{$rooms->PAINTING}}</td>
                  <td>
                    @if(empty($rooms->PAINTING_DATE))
                    -----
                    @else
                    {{$rooms->PAINTING_DATE}}
                    @endif
                  </td>
                </tr>   
                @endforeach
                </tbody>
                <tfoot>
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
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
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
                  <th>Output/Day (ton)</th>
                  <th>Target Output/Day (ton)</th>
                  <th>Productivity</th>
                  <th>Productivity Target</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productivity as $prod)
                <tr>
                  <td>{{ $prod->DATE }}</td>
                  <td>???</td>
                  <td>???</td>
                  <td>{{ $prod->PRODUCTIVITY }}</td>
                  <td>0.55 JO/m<sup>2</sup></td>
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
                    <th>Many Hours Work Realitation</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>                
                @foreach($bbs as $bbss)
                <tr>
                  <td>{{$bbss->WORKER_NAME}}</td>
                  <td>{{$bbss->ID_WORKER}}</td>
                  <td>{{$bbss->SHIFT}}</td>
                  <td>{{$bbss->PROCESS.' '.$bbss->ID_MATERIAL}}</td>
                  <td>{{$bbss->PROBLEM}}</td>
                  <td>{{$bbss->WORKING_HOURS+$bbss->ADD_WORKING_HOURS}}</td>
                  <td>{{$bbss->created_at}}</td>
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
    $('#bbs').DataTable({
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
