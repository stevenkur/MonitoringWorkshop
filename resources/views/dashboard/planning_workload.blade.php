@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Planning Workload
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Planning Production</li>
        <li class="active">Planning Workload</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
        <div class="box box-primary">
                  
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
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>

        </div>
        </div>

        <?php 
          if(isset($_GET['project']) && $_GET['project']!='#') {
          for($j=1; $j<$i; $j++){
            if($shipData[$j]->ID == $_GET['project']){
                $ships = $shipData[$j];
                break;
            }
          }
          $flagProject=true;
          }
          else $flagProject=false;
        ?>

        @if($flagProject)
        <div class="col-lg-12">
        <div class="box box-primary">
        <div class="box-body">
            
            <div class="form-group">
              <label class="col-lg-3"> Project Name </label>
              <label class="col-lg-1"> : </label>
              <label> {{ $ships->PROJECT_NAME }} </label>
            </div>
            <div class="form-group">
              <label class="col-lg-3"> Start Project </label>
              <label class="col-lg-1"> : </label>
              <label> {{ date('d-m-Y', strtotime($ships->START)) }} </label>
            </div>

            <div class="form-group">
              <label class="col-lg-3"> Target Finish Project </label>
              <label class="col-lg-1"> : </label>
              <label> {{ date('d-m-Y', strtotime($ships->FINISH)) }} </label>
            </div>

            <?php
                $date1 = new DateTime($ships->START);
                $date2 = new DateTime($ships->FINISH);
                $diff = $date1->diff($date2);
            ?>
            <div class="form-group">
              <label class="col-lg-3"> Total Day </label>
              <label class="col-lg-1"> : </label>
              <label> {{$diff->days.' days'}} </label>
            </div>

            <div class="form-group">
              <label class="col-lg-3"> Total Workload </label>
              <label class="col-lg-1"> : </label>
              <label> {{ $ships->DISPLACEMENT.' ton' }} </label>
            </div>
        </div>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>SSH Workshop</h3>
        <table id="ssh" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Machine</th>
              <th>Capacity Max per-Day</th>
              <th>Workload Calculate per-Day</th>
            </tr>
          </thead>
            <?php
                $workloadBlasting = ($ships['MATERIAL']/$count[8]->COUNT)/$diff->days;
                $workloadStraightening = ($ships['MATERIAL']/$count[7]->COUNT)/$diff->days;
            ?>
          <tbody>
            @foreach($ssh as $sshs)
            <tr>
                <td>{{ $sshs->NAME }}</td>
                <td>{{ $sshs->OPERATIONAL_HOUR*60*$sshs->CAPACITY.' ton' }}</td>
                <td>
                    @if($sshs->ACTIVITY=="Blasting&ShopPrimer")
                        {{$workloadBlasting.' ton'}}
                    @elseif($sshs->ACTIVITY=="Straightening")
                        {{$workloadStraightening.' ton'}}
                    @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>            
        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>Fabrication Workshop</h3>
        <table id="fabrication" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Machine</th>
              <th>Capacity Max per-Day</th>
              <th>Workload Calculate per-Day</th>
            </tr>
          </thead>
            <?php
                $workloadMarking = ($ships['MATERIAL']/$count[6]->COUNT)/$diff->days;
                $workloadCutting = ($ships['MATERIAL']/$count[5]->COUNT)/$diff->days;
                $workloadBending = ($ships['MATERIAL']/$count[4]->COUNT)/$diff->days;
            ?>
          <tbody>
            @foreach($fabrication as $fab)
            <tr>
                <td>{{ $fab->NAME }}</td>
                <td>{{ $fab->OPERATIONAL_HOUR*60*$fab->CAPACITY.' ton' }}</td>
                <td>                  
                    @if($fab->ACTIVITY=="Marking")
                        {{$workloadMarking.' ton'}}
                    @elseif($fab->ACTIVITY=="Cutting")
                        {{$workloadCutting.' ton'}}
                    @elseif($fab->ACTIVITY=="Bending")
                        {{$workloadBending.' ton'}}
                    @endif
                </td>
            </tr>
            @endforeach  
          </tbody>
        </table>
        </div>            
        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>Sub Assembly Workshop</h3>
        <table id="subassembly" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Machine</th>
              <th>Capacity Max per-Day</th>
              <th>Workload Calculate per-Day</th>
            </tr>
          </thead>
            <?php
                $workloadFitting = ($ships['DISPLACEMENT']/$count[10]->COUNT)/$diff->days;
                $workloadWelding = ($ships['DISPLACEMENT']/$count[12]->COUNT)/$diff->days;
                $workloadGrinding = ($ships['DISPLACEMENT']/$count[9]->COUNT)/$diff->days;
                $workloadFairing = ($ships['DISPLACEMENT']/$count[11]->COUNT)/$diff->days;
            ?>
          <tbody>
            @foreach($subassembly as $subass)
            <tr>
                <td>{{ $subass->NAME }}</td>
                <td>{{ $subass->OPERATIONAL_HOUR*60*$subass->CAPACITY.' ton' }}</td>
                <td>            
                    @if($subass->ACTIVITY=="Fitting")
                        {{$workloadFitting.' ton'}}
                    @elseif($subass->ACTIVITY=="Welding")
                        {{$workloadWelding.' ton'}}
                    @elseif($subass->ACTIVITY=="Grinding")
                        {{$workloadGrinding.' ton'}}
                    @elseif($subass->ACTIVITY=="Fairing")
                        {{$workloadFairing.' ton'}}
                    @endif                  
                </td>
            </tr>
            @endforeach  
          </tbody>
        </table>
        </div>            
        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>Assembly Workshop</h3>
        <table id="assembly" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Machine</th>
              <th>Capacity Max per-Day</th>
              <th>Workload Calculate per-Day</th>
            </tr>
          </thead>
            <?php
                $workloadFitting = ($ships['DISPLACEMENT']/$count[1]->COUNT)/$diff->days;
                $workloadWelding = ($ships['DISPLACEMENT']/$count[3]->COUNT)/$diff->days;
                $workloadGrinding = ($ships['DISPLACEMENT']/$count[2]->COUNT)/$diff->days;
                $workloadFairing = ($ships['DISPLACEMENT']/$count[0]->COUNT)/$diff->days;
            ?>
          <tbody>
            @foreach($assembly as $assemblys)
            <tr>
                <td>{{ $assemblys->NAME }}</td>
                <td>{{ $assemblys->OPERATIONAL_HOUR*60*$assemblys->CAPACITY.' ton' }}</td>
                <td>           
                    @if($assemblys->ACTIVITY=="Fitting")
                        {{$workloadFitting.' ton'}}
                    @elseif($assemblys->ACTIVITY=="Welding")
                        {{$workloadWelding.' ton'}}
                    @elseif($assemblys->ACTIVITY=="Grinding")
                        {{$workloadGrinding.' ton'}}
                    @elseif($assemblys->ACTIVITY=="Fairing")
                        {{$workloadFairing.' ton'}}
                    @endif                     
                </td>
            </tr>
            @endforeach    
          </tbody>
        </table>
        </div>            
        </div>
        </div>

        <!-- <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>BBS Workshop</h3>
        <table id="assembly" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Room</th>
              <th>Workload Calculate per-Day</th>
            </tr>
          </thead>
          <tbody>
            @foreach($room as $rooms)
            <tr>
                <td>{{ $rooms->ROOM }}</td>
                <td>           
                    {{$ships->DISPLACEMENT/$rooms->AREA.' ton'}}
                </td>
            </tr>
            @endforeach    
          </tbody>
        </table>
        </div>            
        </div>
        </div> -->

        <!-- <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>Erection Workshop</h3>
        
        </div>            
        </div>
        </div> -->
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
$(function() {
    $('#ssh').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#fabrication').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#subassembly').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#assembly').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
  });
</script>