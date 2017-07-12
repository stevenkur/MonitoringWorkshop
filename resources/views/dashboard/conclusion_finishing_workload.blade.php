@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Conclusion to Finishing Workload
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Planning Production</li>
        <li class="active">Conclusion to Finishing Workload</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-lg-6">
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->            
            <form class="form">
            <div class="box-body">
              <label for="inputActivity">Select Workshop:</label>
                <div class="form-group">
                  <select class="form-control" name="workshop">
                    <option value="#">-- Workshop List --</option>
                    <option value="1">SSH Workshop</option>
                    <option value="2">Fabrication Workshop</option>
                    <option value="3">Sub Assembly Workshop</option>
                    <option value="4">Assembly Workshop</option>
                    <!-- <option value="5">BBS Workshop</option> -->
                    <!-- <option value="6">Erection Process</option> -->                    
                  </select>
                </div>

              <div class="box-footer">
                <button method="post" class="btn btn-primary">Choose</button>
              </div>   
            </div>
            </form>

        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
         
          <div class="form-group"><br><br>
            <label> <h3>Total Workload All Project :</h3> </label>
            <label> 
                @if(isset($_GET['workshop']) && ($_GET['workshop']==1 || $_GET['workshop']==2))
                <h3><b>{{$total_workload[0]->MAT/1000}} ton</b></h3> </label><br><br>
                @else
                <h3><b>{{$total_workload[0]->TOTAL/1000}} ton</b></h3> </label><br><br>
                @endif
          </div>      

        </div>
        </div>
        </div>
         
        @if(isset($_GET['workshop']))        
        @if($_GET['workshop']==1)
        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <h1>SSH Workshop</h1>
              <table id="ssh" class="table table-bordered table-striped">
                <thead>
                <tr>                 
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Capacity Max/Realization</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </thead>
                <tbody>  
                <?php
                    for($i=0; $i<2; $i++){
                        $productivity[$i] = $capacity[$i] = $realcapacity[$i] = $normal[$i] = $realnormal[$i] = $needs[$i] = 0;
                    }
                ?>
                @foreach($machineproductivity1 as $machprod)     
                <?php 
                    if($machprod->ACTIVITY=="Straightening") $i=0;
                    else if($machprod->ACTIVITY=="Blasting & Shop Primer") $i=1;
                    
                    $productivity[$i] += $machprod->WEIGHT;
                    $capacity[$i] += $machprod->CAPACITY;
                    $realcapacity[$i] += $machprod->WEIGHT;
                    $normal[$i] += $machprod->NORMAL;
                    $realnormal[$i] += $machprod->REALIZATION;
                ?>
                <tr> 
                  <td>{{ $machprod->DATE }}</td>
                  <td>{{ $machprod->MACHINE }}</td>
                  <td>{{ $machprod->CAPACITY }} / {{ $machprod->WEIGHT/1000 }} ton</td>
                  <td>{{ $machprod->NORMAL.'/'.$machprod->REALIZATION.' hours' }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>            
            <div class="box-footer">
            <h3><b>Productivity Per-Month: {{$productivity[1]/1000}} ton</b></h3>
            <h3><b>Target Production Per-Month:</b></h3>
            <h3><b>Conclusion:</b>
            <br>Unfinished: {{($total_workload[0]->MAT-$productivity[1])/1000}} ton
            
            @for($i=0; $i<2; $i++)
                @if($realnormal[$i]>$normal[$i] || $realcapacity[$i]>$capacity[$i])
                <?php 
                    $hours[$i] = (($realnormal[$i]-$normal[$i])/count($normal[$i]))/($normal[$i]/count($normal[$i]));
                    $cap[$i] = (($realcapacity[$i]-$capacity[$i])/count($capacity[$i]))/($capacity[$i]/count($capacity[$i]));
//                    echo $cap[$i].' '.$hours[$i];
                    $needs[$i] = max($cap[$i], $hours[$i]);
                ?>
                <br>Add <strong>{{ceil($needs[$i])}}</strong> More 
                    @if($i==0) Straightening
                    @elseif($i==1) Blasting & Shop Primer @endif
                Machines
                @endif
            @endfor
            <?php 
                $needsWorker = ceil(2*($needs[0]+$needs[1]))-$worker[4]->COUNT;?>
                @if($needsWorker>0)
                    <br>Add <strong>{{$needsWorker}}</strong> More Workers
                @endif
            </h3>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        @elseif($_GET['workshop']==2)

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <h1>Fabrication Workshop</h1>
              <table id="fabrication" class="table table-bordered table-striped">
                <thead>
                <tr>                 
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Capacity Max/Realization</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </thead>
                <tbody>  
                <?php
                    for($i=0; $i<3; $i++){
                        $productivity[$i] = $capacity[$i] = $realcapacity[$i] = $normal[$i] = $realnormal[$i] = $needs[$i] = 0;
                    }
                ?>
                @foreach($machineproductivity2 as $machprod)
                    <?php
                    if($machprod->ACTIVITY=="Marking") $i=0;
                    else if($machprod->ACTIVITY=="Cutting") $i=1;
                    else if($machprod->ACTIVITY=="Bending") $i=2;
                    
                    $productivity[$i] += $machprod->WEIGHT;
                    $capacity[$i] += $machprod->CAPACITY;
                    $realcapacity[$i] += $machprod->WEIGHT;
                    $normal[$i] += $machprod->NORMAL;
                    $realnormal[$i] += $machprod->REALIZATION;?>
                <tr> 
                  <td>{{ $machprod->DATE }}</td>
                  <td>{{ $machprod->MACHINE }}</td>
                  <td>{{ $machprod->CAPACITY }} / {{ $machprod->WEIGHT/1000 }} ton</td>
                  <td>{{ $machprod->NORMAL.'/'.$machprod->REALIZATION.' hours' }}</td>
                </tr>
                @endforeach                
                </tbody>
              </table>
            </div>            
            <div class="box-footer">
            <h3><b>Productivity Per-Month: {{$productivity[2]/1000}} ton</b></h3>
            <h3><b>Target Production Per-Month:</b></h3>
            <h3><b>Conclusion:</b>
            <br>Unfinished: {{($total_workload[0]->MAT-$productivity[2])/1000}} ton
            
            @for($i=0; $i<3; $i++)
                @if($realnormal[$i]>$normal[$i] || $realcapacity[$i]>$capacity[$i])
                <?php 
                    $cap[$i] = (($realnormal[$i]-$normal[$i])/count($normal[$i]))/($normal[$i]/count($normal[$i]));
                    $hours[$i] = (($realcapacity[$i]-$capacity[$i])/count($capacity[$i]))/($capacity[$i]/count($capacity[$i]));
                    $needs[$i] = max($cap[$i], $hours[$i]);
                ?>
                <br>Add <strong>{{ceil($needs[$i])}}</strong> More 
                    @if($i==0) Marking
                    @elseif($i==1) Cutting
                    @elseif($i==2) Bending @endif
                Machines
                @endif
            @endfor
            <?php 
                $needsWorker = ceil(2*($needs[0]+$needs[1]+$needs[2]))-$worker[3]->COUNT;?>
                @if($needsWorker>0)
                    <br>Add <strong>{{$needsWorker}}</strong> More Workers
                @endif
            </h3>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        @elseif($_GET['workshop']==3)

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <h1>Sub Assembly Workshop</h1>
              <table id="subassembly" class="table table-bordered table-striped">
                <thead>
                <tr>                 
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Capacity Max/Realization</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </thead>
                <tbody>  
                <?php
                    for($i=0; $i<4; $i++){
                        $productivity[$i] = $capacity[$i] = $realcapacity[$i] = $normal[$i] = $realnormal[$i] = $needs[$i] = 0;
                    }
                ?>
                @foreach($machineproductivity3 as $machprod)   
                <?php
                    if($machprod->ACTIVITY=="Fitting") $i=0;
                    else if($machprod->ACTIVITY=="Welding") $i=1;
                    else if($machprod->ACTIVITY=="Grinding") $i=2;
                    else if($machprod->ACTIVITY=="Fairing") $i=3;
                    
                    $productivity[$i] += $machprod->WEIGHT;
                    $capacity[$i] += $machprod->CAPACITY;
                    $realcapacity[$i] += $machprod->WEIGHT;
                    $normal[$i] += $machprod->NORMAL;
                    $realnormal[$i] += $machprod->REALIZATION;?>
                <tr> 
                  <td>{{ $machprod->DATE }}</td>
                  <td>{{ $machprod->MACHINE }}</td>
                  <td>{{ $machprod->CAPACITY }} / {{ $machprod->WEIGHT/1000 }} ton</td>
                  <td>{{ $machprod->NORMAL.'/'.$machprod->REALIZATION.' hours' }}</td>
                </tr>
                @endforeach                
                </tbody>
              </table>
            </div>            
            <div class="box-footer">
            <h3><b>Productivity Per-Month: {{$productivity[3]/1000}} ton</b></h3>
            <h3><b>Target Production Per-Month:</b></h3>
            <h3><b>Conclusion:</b>
            <br>Unfinished: {{($total_workload[0]->TOTAL-$productivity[3])/1000}} ton
            
            @for($i=0; $i<3; $i++)
                @if($realnormal[$i]>$normal[$i] || $realcapacity[$i]>$capacity[$i])
                <?php 
                    $cap[$i] = (($realnormal[$i]-$normal[$i])/count($normal[$i]))/($normal[$i]/count($normal[$i]));
                    $hours[$i] = (($realcapacity[$i]-$capacity[$i])/count($capacity[$i]))/($capacity[$i]/count($capacity[$i]));
                    $needs[$i] = max($cap[$i], $hours[$i]);
                ?>
                <br>Add <strong>{{ceil($needs[$i])}}</strong> More 
                    @if($i==0) Fitting
                    @elseif($i==1) Welding
                    @elseif($i==2) Grinding
                    @elseif($i==2) Fairing @endif
                Machines
                @endif
            @endfor
            <?php 
                $needsWorker = ceil(2*($needs[0]+$needs[1]+$needs[2]+$needs[3]))-$worker[5]->COUNT;?>
                @if($needsWorker>0)
                    <br>Add <strong>{{$needsWorker}}</strong> More Workers
                @endif
            </h3>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        @elseif($_GET['workshop']==4)

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <h1>Assembly Workshop</h1>
              <table id="subassembly" class="table table-bordered table-striped">
                <thead>
                <tr>                 
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Capacity Max/Realization</th>
                  <th>Normal/Realization Hours</th>
                </tr>
                </thead>
                <tbody>  
                <?php
                    for($i=0; $i<4; $i++){
                        $productivity[$i] = $capacity[$i] = $realcapacity[$i] = $normal[$i] = $realnormal[$i] = $needs[$i] = 0;
                    }
                ?>
                @foreach($machineproductivity4 as $machprod)   
                <?php
                    if($machprod->ACTIVITY=="Fitting") $i=0;
                    else if($machprod->ACTIVITY=="Welding") $i=1;
                    else if($machprod->ACTIVITY=="Grinding") $i=2;
                    else if($machprod->ACTIVITY=="Fairing") $i=3;
                    
                    $productivity[$i] += $machprod->WEIGHT;
                    $capacity[$i] += $machprod->CAPACITY;
                    $realcapacity[$i] += $machprod->WEIGHT;
                    $normal[$i] += $machprod->NORMAL;
                    $realnormal[$i] += $machprod->REALIZATION;?>
                <tr> 
                  <td>{{ $machprod->DATE }}</td>
                  <td>{{ $machprod->MACHINE }}</td>
                  <td>{{ $machprod->CAPACITY }} / {{ $machprod->WEIGHT/1000 }} ton</td>
                  <td>{{ $machprod->NORMAL.'/'.$machprod->REALIZATION.' hours' }}</td>
                </tr>
                @endforeach                
                </tbody>
              </table>
            </div>            
            <div class="box-footer">
            <h3><b>Productivity Per-Month: {{$productivity[3]/1000}} ton</b></h3>
            <h3><b>Target Production Per-Month:</b></h3>
            <h3><b>Conclusion:</b>
            <br>Unfinished: {{($total_workload[0]->TOTAL-$productivity[3])/1000}} ton
            
            @for($i=0; $i<3; $i++)
                @if($realnormal[$i]>$normal[$i] || $realcapacity[$i]>$capacity[$i])
                <?php 
                    $cap[$i] = (($realnormal[$i]-$normal[$i])/count($normal[$i]))/($normal[$i]/count($normal[$i]));
                    $hours[$i] = (($realcapacity[$i]-$capacity[$i])/count($capacity[$i]))/($capacity[$i]/count($capacity[$i]));
                    $needs[$i] = max($cap[$i], $hours[$i]);
                ?>
                <br>Add <strong>{{ceil($needs[$i])}}</strong> More 
                    @if($i==0) Fitting
                    @elseif($i==1) Welding
                    @elseif($i==2) Grinding
                    @elseif($i==2) Fairing @endif
                Machines
                @endif
            @endfor
            <?php 
                $needsWorker = ceil(2*($needs[0]+$needs[1]+$needs[2]+$needs[3]))-$worker[5]->COUNT;?>
                @if($needsWorker>0)
                    <br>Add <strong>{{$needsWorker}}</strong> More Workers
                @endif
            </h3>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        @elseif($_GET['workshop']==5)
        
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
              <h1>BBS Workshop</h1>
              <table id="bbs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Target Output Machine</th>
                  <th>Capacity Max</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>            
            <div class="box-footer">
            <h3><b>Productivity Per-Month:</b></h3>
            <h3><b>Target Production Per-Month:</b></h3>
            <h3><b>Conclusion:</b>
            <br>Unfinished: XXX ton or m<sup>2</sup>
            <br>Add More JO: XXX
            <br>or Add More Machine: XXX
            </h3>
            </div>
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

<script>
//    function findMax(realnormal, normal, realcapacity, capacity){
//        var norm = ((realnormal-normal)/count(normal))/(normal/count(normal));
//        var cap = ((realcapacity-capacity)/count(capacity))/(capacity/count(capacity));
//        return max(norm,cap);
//    }
$(function() {
    $('#ssh').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#fabrication').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#subassembly').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#assembly').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#bbs').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
  });
</script>