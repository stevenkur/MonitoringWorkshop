@extends('layouts.backend-userbbs')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Activities & Worker
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>BBS</li>
        <li class="active">Input Activities & Worker</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

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
            <form role="form" name="ShipBlock" name="block">
              <div class="box-body">
              <label for="inputActivity">Select BLock:</label>
                <div class="form-group">
                  <select class="form-control" name="block">
                    <option id="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $datas)
                        <?php $blockData[$i] = $datas; $i++;?>
                        <option value="{{$data->ID}}">{{$datas->NAME}}</option>
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
            if(isset($_GET['process'])){
                $proc = explode('|', $_GET['process']);
                $flagProcess = true;
                if($proc[0]==1) $process = 'Blasting';
                else if($proc[0]==2) $process = 'Painting';
                $idMaterial = $proc[1];

                for($j=0; $j<$count; $j++){
                  if($room[$j]->ID == $idMaterial){
                      $data = $room[$j];
                      break;
                  }
                }
            }
            else $flagProcess = false;
        ?>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h4 align="right"><b>Target Quantity per Day: [TARGET] Plate</b></h4>
              <div class="table-responsive" style="overflow: auto">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area (m<sup>2</sup>)</th>
                  <th>Total Layer</th>
                  <th>Room Process</th>
                </tr>
                </thead>
                <tbody>
                @foreach($room as $rooms)
                <?php 
                    if($rooms->BLASTING<$rooms->TOTAL_LAYER) $flagBlast = false;
                    else $flagBlast = true;
                    if($rooms->PAINTING<$rooms->TOTAL_LAYER) $flagPaint = false;
                    else $flagPaint = true;

                    if($flagBlock && $rooms->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$rooms['ROOM'].'</td>
                        <td>'.$rooms['SIDE'].'</td>
                        <td>'.$rooms['FRAME'].'</td>
                        <td>'.$rooms['DECK'].'</td>
                        <td>'.$rooms['AREA'].'</td>
                        <td>'.$rooms['TOTAL_LAYER'];?></td>
                        <td>
                          @if(!$flagBlast)
                            <form action="./input_act_bbs" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Room Process List --</option>
                                    <option value="1|<?php echo $rooms['ID'];?>">Blasting</option>
                                </select>
                            </form>
                            @elseif(!$flagPaint)
                            <form action="./input_act_bbs" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Room Process List --</option>
                                    <option value="2|<?php echo $rooms['ID'];?>">Painting</option>
                                </select>
                            </form>                            
                            @else
                            Finished
                            @endif
                        </td>
                    <?php echo '</tr>';
                    }
                    else if($flagProject && $rooms->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$rooms['ROOM'].'</td>
                        <td>'.$rooms['SIDE'].'</td>
                        <td>'.$rooms['FRAME'].'</td>
                        <td>'.$rooms['DECK'].'</td>
                        <td>'.$rooms['AREA'].'</td>
                        <td>'.$rooms['TOTAL_LAYER'];?></td>
                        <td>
                          @if(!$flagBlast)
                            <form action="./input_act_bbs" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Room Process List --</option>
                                    <option value="1|<?php echo $rooms['ID'];?>">Blasting</option>
                                </select>
                            </form>
                            @elseif(!$flagPaint)
                            <form action="./input_act_bbs" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Room Process List --</option>
                                    <option value="2|<?php echo $rooms['ID'];?>">Painting</option>
                                </select>
                            </form>                            
                            @else
                            Finished
                            @endif
                        </td>
                    <?php echo '</tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$rooms['ROOM'].'</td>
                        <td>'.$rooms['SIDE'].'</td>
                        <td>'.$rooms['FRAME'].'</td>
                        <td>'.$rooms['DECK'].'</td>
                        <td>'.$rooms['AREA'].'</td>
                        <td>'.$rooms['TOTAL_LAYER'];?></td>
                        <td>
                          @if(!$flagBlast)
                            <form action="./input_act_bbs" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Room Process List --</option>
                                    <option value="1|<?php echo $rooms['ID'];?>">Blasting</option>
                                </select>
                            </form>
                            @elseif(!$flagPaint)
                            <form action="./input_act_bbs" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Room Process List --</option>
                                    <option value="2|<?php echo $rooms['ID'];?>">Painting</option>
                                </select>
                            </form>                            
                            @else
                            Finished
                            @endif
                        </td>
                    <?php echo '</tr>';
                    }?>
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        @if($flagProcess)
        <div class="col-md-12">
        <form action="{{route('input_works_bbs')}}" role="form" method="post">
        {{csrf_field()}}
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Worker & Time</h3>
              <div class="table-responsive" style="overflow: auto">
              <table id="tabel2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Worker</th>
                  <th>NIK</th>
                  <th>Position/Division</th>
                  <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                @foreach($worker as $workers)
                <tr>
                  <td>{{$workers->NAME}}</td>
                  <td>{{$workers->NIK}}</td>
                  <td>{{$workers->POSITION.'/'.$workers->DIVISION}}</td>
                  <td>
                    <input name="<?php echo 'id'.$i;?>" type="hidden" value="{{ $workers->ID }}">
                    <input name="<?php echo 'name'.$i;?>" type="hidden" value="{{ $workers->NAME }}">
                    <select class="form-control" name="<?php echo 'attendance'.$i;?>">
<!--                      <option value="#">-- Attendance List --</option>-->
                      <option id="1">Present</option>
                      <option id="2">Was Sick/Accident</option>
                      <option id="3">Was Absent</option>
                    </select>
                  </td>
                </tr>
                <?php $i++;?> 
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->

            <input name="num" type="hidden" value="{{ $worker->count() }}">
            <input name="id_material" type="hidden" value="{{ $idMaterial }}">
            <input name="process" type="hidden" value="{{ $process }}">
            <div class="col-lg-3">
                <div class="box box-primary">
                    <div class="box box-body">
                        <div class="form-group">
                            @if($process == 'Blasting')
                            <input type="hidden" id="finishedlayer" name="finishedlayer" value="{{$data->TOTAL_LAYER}}"><br>
                            @else
                            <label style="font-size: 16px">Remaining Layer: {{ $data->TOTAL_LAYER-$data->PAINTING }}</label><br>
                            <label style="font-size: 16px">Finished Layer: </label><br>
                            <input type="text" id="finishedlayer" name="finishedlayer" placeholder="" value="0"><br>
                            @endif
                          
                          <label style="font-size: 16px">Input Working Hours: </label><br>
                          <input type="text" id="machinehours" name="workinghours" placeholder="" value="0">
                          <label>hours</label>              
                          <label style="font-size: 16px">Additional Working Hours: </label><br>
                          <input type="text" id="additionalhours" NAME="workingaddhours" placeholder="" value="0">
                          <label>hours</label>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-4">
                    <div class="box box-primary">
                        <div class="box box-body">
                            <div class="form-group">
                              <label style="font-size: 16px">Problem: </label>
                              <select class="form-control" name="problem">
                                <option id="1">No Problem</option>
                                <option id="2">Broken Machine</option>
                                <option id="3">Worker Sick/Acident</option>
                                <option id="4">Power Failure</option>
                                <option id="5">Worker Absent</option>
                              </select>
                              <br>
                              <label style="font-size: 16px">Waste Time (If any): </label>
                              <input type="text" id="wastetime" name="wastetime" placeholder="" value="0">
                              <label>hours</label>
                              <br>
                              <label style="font-size: 16px">Shift: </label>
                              <select class="form-control" name="shift">
                                <option id="1">Shift 1</option>
                                <option id="2">Shift 2</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer" align="right">
                  <button type="reset" class="btn btn-primary">Reset</button>
                  <button type="submit" class="btn btn-primary">Input</button>
                </div>
            </div>
            </form>
        </div>
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
    $('#tabel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#tabel2').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
